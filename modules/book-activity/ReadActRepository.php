<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class ReadActRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'read_act';
        // status can be 'toread','currentlyreading' or 'finishedreading'
        $attributes = ['username', 'isbn', 'status', 'start_date', 'finish_date'];
        $ids = ['username', 'isbn'];
        parent::__construct($tableName, $attributes, $ids);
    }
}