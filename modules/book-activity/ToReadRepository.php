<?php


require_once dirname(__FILE__, 2) . '/database/Repository.php';
class ToReadRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'toread';
        $attributes = ['username','ISBN','addDate'];
        $ids = ['username','ISBN'];
        parent::__construct($tableName, $attributes, $ids);
    }
}