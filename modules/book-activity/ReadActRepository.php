<?php


require_once dirname(__FILE__, 2) . '/database/Repository.php';
class ReadActRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'readact';
        // status can be 'toread','currentlyreading' or 'finishedreading'
        $attributes = ['username','ISBN','status','startDate','finishDate'];
        $ids = ['username','ISBN'];
        parent::__construct($tableName, $attributes, $ids);
    }
}