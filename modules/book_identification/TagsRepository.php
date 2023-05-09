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
}
