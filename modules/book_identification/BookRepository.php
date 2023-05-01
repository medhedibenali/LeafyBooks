<?php

require_once dirname(__FILE__, 2) . '/database/Repository.php';

class BookRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'books';
        $attributes = ['isbn', 'title', 'author', 'publisher', 'picture','publishing_year','rating'];
        $ids = ['isbn'];
        parent::__construct($tableName, $attributes, $ids);
    }

    public function findByTitleOrAuthor($search=""){
        $request='select * from '.$this->tableName.'
         where title like concat("%",?,"%") or author like concat("%",?,"%")';
        $response = $this->db->prepare($request);
        $response->execute([$search,$search]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
    public function findByTitleOrAuthorLimit($search="",$offset=0,$numberMAX=0){
        $request='select * from '.$this->tableName.'
         where (title like concat("%",?,"%") or author like concat("%",?,"%") )
         limit '.intval($offset). ' , '.intval($numberMAX) ;
        $response = $this->db->prepare($request);
        $response->execute([$search,$search]);

        return $response->fetchAll(PDO::FETCH_OBJ);
    }
   /* public function find($input)
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
    }*/


    public function findOne($input)
    {
        if (!$this->areValidAttributes($input)) {
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