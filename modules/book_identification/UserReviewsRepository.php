<?php

require_once dirname(__FILE__, 2) . '/database/Repository.php';

class UserReviewsRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'user_reviews';
        $attributes = ['ISBN', 'username','review','rating'];
        $ids = ['ISBN','username'];
        parent::__construct($tableName, $attributes, $ids);
    }

    public function findALL($input)
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







}