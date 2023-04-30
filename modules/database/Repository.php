<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

/**
 * Abstract class for a repository.
 *
 * This class represents a repository for a specific type of data. It
 * provides methods for adding, removing, updating and retrieving data
 * from the database.
 */

abstract class Repository
{
    protected PDO $db;
    protected $aliases;

    /**
     * Creates a new instance of the Repository with the specified arguments.
     *
     * @param string $tableName The name of the table in the database.
     * @param array $attributes All the column names of the table.
     * @param array $id The id column names of the table.
     */

    public function __construct(protected $tableName, protected $attributes, protected $id)
    {
        if (
            !empty(array_diff(
                $this->id,
                $this->attributes
            ))
        ) {
            throw new Exception("the fields of the id must be valid attributes");
        }
        $this->db = ConnexionDB::getInstance();
        $this->aliases = [];
        $max = max(
            array_map(
                fn ($val) => strlen($val),
                $this->attributes
            )
        );
        $base = str_repeat("x", $max);
        foreach ($this->id as $index => $id) {
            $this->aliases[$id] = $base . $index;
        }
    }

    /**
     * Checks that the keys of the input array are all in the array of
     * valid attributes.
     *
     * @param array $input Key-Value pairs where the keys are going to be
     * checked against the attributes.
     * @return bool
     */

    final protected function areValidAttributes($input)
    {
        return empty(array_diff(
            array_keys($input),
            $this->attributes
        ));
    }

    /**
     * Checks that the keys of the input array are the same as the id.
     * 
     * @param array $input Key-Value pairs where the keys are going to be
     * checked against the id.
     * @return boolean
     */

    final protected function isValidId($input)
    {
        return
            !empty($this->id) &&
            empty(array_diff(
                array_keys($input),
                $this->id
            )) &&
            empty(array_diff(
                $this->id,
                array_keys($input)
            ));
    }

    /**
     * Formats input for PDO.
     *
     * @param array $input Key-Value pairs where the keys are the column
     * names to be formated.
     * @return array
     */

    final protected function formatInput($input)
    {
        $output = [];
        foreach ($input as $key => $value) {
            $output[':' . $key] = $value;
        }
        return $output;
    }

    /**
     * Returns a string from the given options array to be used as the
     * where clause in find.
     * Override to change the behavior of find.
     * Consider overriding limitClause if you override whereClause so
     * the output of find has the expected type.
     * 
     * @param array $options The options passed to find.
     * @return string
     */

    protected function whereClause($options)
    {
        if (empty($options)) {
            return '';
        }
        return ' WHERE ' .
            implode(
                ' AND ',
                array_map(
                    fn ($name) => "$name = :$name",
                    array_keys($options)
                )
            );
    }

    /**
     * Returns a string from the given options array to be used as the
     * order by clause in find.
     * Override to change the behavior of find.
     *
     * @param array $options The options passed to find.
     * @return string
     */

    protected function orderByClause($options)
    {
        $options = $options['order_by'] ?? [];
        if (
            empty($options) ||
            !$this->areValidAttributes($options)
        ) {
            return '';
        }
        array_walk(
            $options,
            fn (&$value, $key) => $value = strtoupper($value)
        );
        $directions = ['ASC', 'DESC'];
        if (!empty(array_diff(array_values($options), $directions))) {
            return '';
        }
        array_walk(
            $options,
            fn (&$value, $key) => $value = "$key $value"
        );
        return ' ORDER BY ' .
            implode(
                " , ",
                array_values($options)
            );
    }

    /**
     * Returns a string from the given options array to be used as the
     * limit clause in find.
     * Override to change the behavior of find.
     *
     * @param array $options The options passed to find.
     * @return string
     */

    protected function limitClause($options)
    {
        if (
            !isset($options['limit'])
        ) {
            return '';
        }
        $limit = ' LIMIT ' . intval($options['limit']);
        if (!isset($options['offset'])) {
            return $limit;
        }
        return $limit .
            ' OFFSET ' . intval($options['offset']);
    }

    /**
     * Checks if the output will be unique.
     * Override to change the behavior of find.
     *
     * @param string $input The input passed to find.
     * @param array $options The options passed to find.
     * @return bool
     */

    protected function isUnique($input, $options)
    {
        return
            $this->isValidId($input) ||
            (intval($options['limit'] ?? '0') == 1);
    }

    /**
     * Finds records in the database.
     *
     * @param array $input Key-Value pairs where the keys are the
     * column names and the values are the values to search for.
     * [optional] if not supplied, find will output all records.
     * @param array $options Key-Value pairs to modifie the output.
     * [optional] If supplied, the output of find will change depending
     * on the keys set.
     * $options['order_by'] is an array of key-value pairs where the keys
     * are the column names to order by and the values are either 'ASC'
     * or 'DESC' for ascending or descending respectively.
     * $options['limit'] is an int indication the number of records
     * to return.
     * $options['offset'] is an int indication the number of records
     * to skip (limit must be set for the offset to change the output).
     * @return mixed Returns an array if isUnique returns false,
     * returns an object if isUnique returns true and a record exists
     * and returns false otherwise.
     */

    public function find($input = array(), $options = array())
    {
        if (!$this->areValidAttributes($input)) {
            return;
        }
        $conditions = $this->whereClause($input);
        $orderBy = $this->orderByClause($options);
        $limit = $this->limitClause($options);
        $request =
            "SELECT *
            FROM $this->tableName
            $conditions
            $orderBy
            $limit";
        $reponse = $this->db->prepare($request);
        $params = $this->formatInput($input);
        $reponse->execute($params);
        if ($this->isUnique($input, $options)) {
            return $reponse->fetch(PDO::FETCH_OBJ);
        }
        return $reponse->fetchALL(PDO::FETCH_OBJ);
    }

    /**
     * Inserts the given input into the database.
     * Returns true if the insert was successful, and false otherwise.
     * 
     * @param array $input Key-Value pairs where the keys are the column
     * names and the values are the values to insert.
     * @return bool
     */

    public function insert($input)
    {
        if (!$this->areValidAttributes($input)) {
            return false;
        }
        $keys = implode(',', array_keys($input));
        $params = $this->formatInput($input);
        $values = implode(',', array_keys($params));
        $request = "INSERT INTO $this->tableName ($keys) VALUES ($values)";
        $reponse = $this->db->prepare($request);
        $reponse->execute($params);
        return true;
    }

    /**
     * Deletes a record from the database.
     * Returns true if the record was deleted, false otherwise.
     * 
     * @param array $conditions Key-Value pairs where the keys are the id
     * column names and the values are the values to search for.
     * @return bool
     */

    public function delete($conditions)
    {
        if (!$this->isValidId($conditions)) {
            return false;
        }
        $conditions = implode(
            " and ",
            array_map(
                fn ($name) => "$name = :$name",
                $this->id
            )
        );
        $request =
            "DELETE FROM $this->tableName
            WHERE $conditions";
        $reponse = $this->db->prepare($request);
        $params = $this->formatInput($conditions);
        $reponse->execute($params);
        return true;
    }

    /**
     * Updates a record in a database based on the given conditions and
     * input values.
     * Returns true if the update was successful and false otherwise.
     * 
     * @param array $conditions Key-Value pairs where the keys are the id
     * column names and the values are the values to search for.
     * @param array $input Key-Value pairs where the keys are the column
     * names and the values are the new values to set.
     * @return bool
     */

    public function update($conditions, $input)
    {
        if (
            !$this->isValidId($conditions) ||
            !$this->areValidAttributes($input)
        ) {
            return false;
        }
        $values =
            implode(
                ',',
                array_map(
                    fn ($name) => "$name = :$name",
                    array_keys($input)
                )
            );
        $condition =
            implode(
                ' and ',
                array_map(
                    fn ($name) => "$name = :" . $this->aliases[$name],
                    array_keys($conditions)
                )
            );
        $request =
            "UPDATE $this->tableName 
            SET $values
            WHERE $condition";
        $reponse = $this->db->prepare($request);
        $id = [];
        foreach ($conditions as $key => $value) {
            $id[':' . $this->aliases[$key]] = $value;
        }
        $params = $this->formatInput($input) + $id;
        $reponse->execute($params);
        return true;
    }
}
