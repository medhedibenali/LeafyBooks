<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class AuthorRepository extends Repository
{
    public function __construct()
    {
        $tableName = 'authors';
        $attributes = ['id', 'pen_name', 'first_name', 'last_name', 'birthday', 'death_day', 'bio', 'nationality', 'picture'];
        $ids = ['id'];
        parent::__construct($tableName, $attributes, $ids);
    }
}




