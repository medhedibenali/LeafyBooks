<?php


require_once dirname(__FILE__, 2) . '/database/Repository.php';
class CurrentReadRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'currentread';
        $attributes = ['username','ISBN','startDate'];
        $ids = ['username','ISBN'];
        parent::__construct($tableName, $attributes, $ids);
    }
}