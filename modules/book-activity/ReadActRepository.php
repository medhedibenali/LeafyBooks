<?php


require_once dirname(__FILE__, 2) . '/database/Repository.php';
class ReadActRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'read_act';
        // status can be 'to_read','currently_reading' or 'finished_reading'
        $attributes = ['username','ISBN','status','library','start_date','finish_date'];
        $ids = ['username','ISBN'];
        parent::__construct($tableName, $attributes, $ids);
    }
}



