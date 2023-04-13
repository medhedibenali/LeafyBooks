<?php

require_once dirname(__FILE__, 2) . '/database/Repository.php';

class BookRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'books';
        $attributes = ['ISBN', 'title', 'author', 'publisher', 'picture','publishing_year','rating'];
        $ids = ['ISBN'];
        parent::__construct($tableName, $attributes, $ids);
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
        return $reponse->fetchAll(PDO::FETCH_OBJ);
    }


    public function findOne($input)
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




}