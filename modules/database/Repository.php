<?php
require_once 'ConnexionDB.php';

abstract class Repository
{
    protected PDO $db;
    protected $aliases;

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

    final protected function areValidAttributes($input)
    {
        return empty(array_diff(
            array_keys($input),
            $this->attributes
        ));
    }

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

    final protected function formatInput($input)
    {
        $output = [];
        foreach ($input as $key => $value) {
            $output[':' . $key] = $value;
        }
        return $output;
    }

    protected function whereClause($input)
    {
        if (empty($input)) {
            return '';
        }
        return ' WHERE ' .
            implode(
                ' AND ',
                array_map(
                    fn ($name) => "$name = :$name",
                    array_keys($input)
                )
            );
    }

    protected function orderByClause($input)
    {
        $input = $input['order_by'] ?? [];
        if (
            empty($input) ||
            !$this->areValidAttributes($input)
        ) {
            return '';
        }
        array_walk(
            $input,
            fn (&$value, $key) => $value = strtoupper($value)
        );
        $directions = ['ASC', 'DESC'];
        if (!empty(array_diff(array_values($input), $directions))) {
            return '';
        }
        array_walk(
            $input,
            fn (&$value, $key) => $value = "$key $value"
        );
        return ' ORDER BY ' .
            implode(
                " , ",
                array_values($input)
            );
    }

    protected function limitClause($input)
    {
        if (
            !isset($input['limit'])
        ) {
            return '';
        }
        $limit = ' LIMIT ' . intval($input['limit']);
        if (!isset($input['offset'])) {
            return $limit;
        }
        return $limit .
            ' OFFSET ' . intval($input['offset']);
    }

    protected function isUnique($input, $options)
    {
        return
            $this->isValidId($input) ||
            (intval($options['limit'] ?? '0') == 1);
    }

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

    public function insert($input)
    {
        if (!$this->areValidAttributes($input)) {
            return false;
        }
        $keys = implode(',', array_keys($input));
        $params = $this->formatInput($input);
        $values = implode(',', array_keys($params));
        $request = "INSERT IGNORE INTO $this->tableName ($keys) VALUES ($values)";
        $reponse = $this->db->prepare($request);
        $reponse->execute($params);
        return true;
    }

    public function delete($id)
    {
        if (!$this->isValidId($id)) {
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
        $params = $this->formatInput($id);
        $reponse->execute($params);
        return true;
    }

    public function update($inputConditions, $inputValues)
    {
        if (
            !$this->isValidId($inputConditions) ||
            !$this->areValidAttributes($inputValues)
        ) {
            return false;
        }
        $values =
            implode(
                ',',
                array_map(
                    fn ($name) => "$name = :$name",
                    array_keys($inputValues)
                )
            );
        $conditions =
            implode(
                ',',
                array_map(
                    fn ($name) => "$name = :" . $this->aliases[$name],
                    array_keys($inputConditions)
                )
            );
        $request =
            "UPDATE $this->tableName 
            SET $values
            WHERE $conditions";
        $reponse = $this->db->prepare($request);
        $id = [];
        foreach ($inputConditions as $key => $value) {
            $id[':' . $this->aliases[$key]] = $value;
        }
        $params = $this->formatInput($inputValues) + $id;
        $reponse->execute($params);
        return true;
    }
}
