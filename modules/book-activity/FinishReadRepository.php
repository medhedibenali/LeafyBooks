<?php


require_once dirname(__FILE__, 2) . '/database/Repository.php';
class FinishReadRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'finishread';
        $attributes = ['username','ISBN','finishDate'];
        $ids = ['username','ISBN'];
        parent::__construct($tableName, $attributes, $ids);
    }
}