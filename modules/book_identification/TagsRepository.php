<?php

class TagsRepository extends  Repository
{
    public function __construct()
    {
        $tableName = 'tags';
        $attributes = ['isbn', 'tag'];
        $ids = ['isbn', 'tag'];
        parent::__construct($tableName, $attributes, $ids);
    }
    public function getAllTags()
    {
        $request = 'select distinct tag from ' . $this->tableName;
        $response = $this->db->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_OBJ);
    }
}
