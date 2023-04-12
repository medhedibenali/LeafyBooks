<?php
require_once 'ConnexionDB.php';

abstract class Repository
{
    protected PDO $db;
    protected $aliases;

    public function __construct(protected $tableName, protected $attributes, protected $ids)
    {
        $this->db = ConnexionDB::getInstance();
        $this->aliases = [];
        $max = max(
            array_map(function ($val) {
                return strlen($val);
            }, $this->ids)
        );
        $base = str_repeat("x", $max);
        foreach ($this->ids as $index => $id) {
            $this->aliases[$id] = $base . $index;
        }
    }

    final protected function isValidAttribute($input)
    {
        return empty(array_diff(
            array_keys($input),
            $this->attributes
        ));
    }

    final protected function isValidId($input)
    {
        return empty(array_diff(
            array_keys($input),
            $this->ids
        )) &&
            empty(array_diff(
                $this->ids,
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

    public function find($input)
    {
        if (!$this->isValidAttribute($input)) {
            return array();
        }
        $conditions = implode(
            " and ",
            array_map(function ($name) {
                return "$name = :$name";
            }, array_keys($input))
        );
        $params = $this->formatInput($input);
        $request =
            "SELECT *
            FROM $this->tableName
            WHERE $conditions";
        $reponse = $this->db->prepare($request);
        $reponse->execute($params);
        return $reponse->fetch(PDO::FETCH_OBJ);
    }

    public function insert($input)
    {
        if (!$this->isValidAttribute($input)) {
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

    public function delete($id)
    {
        if (!$this->isValidId($id)) {
            return false;
        }
        $conditions = implode(
            " and ",
            array_map(function ($name) {
                return "$name = :$name";
            }, $this->ids)
        );
        $request =
            "DELETE FROM $this->tableName
            WHERE $conditions";
        $reponse = $this->db->prepare($request);
        $reponse->execute($id);
        return true;
    }

    public function update($inputConditions, $inputValues)
    {
        if (
            !$this->isValidId($inputConditions) ||
            !$this->isValidAttribute($inputValues)
        ) {
            return false;
        }
        $values =
            implode(
                ',',
                array_map(function ($name) {
                    return "$name = :$name";
                }, array_keys($inputValues))
            );
        $conditions =
            implode(
                ',',
                array_map(function ($name) {
                    return "$name = :" . $this->aliases[$name];
                }, $inputConditions)
            );
        $id = $this->formatInput(array_map(function ($name) {
            return $this->aliases[$name];
        }, $inputConditions));
        $params = $this->formatInput($inputValues);
        $request =
            "UPDATE $this->tableName 
            SET $values
            WHERE $conditions";
        $reponse = $this->db->prepare($request);
        $reponse->execute($params);
        return true;
    }
}
