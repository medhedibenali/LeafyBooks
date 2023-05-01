<?php


require_once dirname(__FILE__, 2) . '/database/Repository.php';
class ReadActRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'read-act';
        // status can be 'toread','currentlyreading' or 'finishedreading'
        $attributes = ['username','ISBN','status','library','start_date','finish_date'];
        $ids = ['username','ISBN'];
        parent::__construct($tableName, $attributes, $ids);
    }
}