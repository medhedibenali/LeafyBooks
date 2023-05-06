<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class ReadActRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'read_act';
        // status can be 'to_read','currently_reading' or 'finished_reading'
        // for 'to_read', 'start_date' is when the user added the book and 'finish_date' is null
        // for 'currently_reading', 'start_date' is when the user added the book and 'finish_date' is when the user starting reading the book
        // for 'finshed_reading', 'start_date' is when the user started reading the book and 'finish_date' is when the user finished the book
        $attributes = ['username', 'isbn', 'status', 'start_date', 'finish_date'];
        $ids = ['username', 'isbn'];
        parent::__construct($tableName, $attributes, $ids);
    }
}
