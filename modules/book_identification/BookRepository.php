<?php

require_once dirname(__FILE__, 2) . '/database/Repository.php';

class BookRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'books';
        $attributes = ['isbn', 'title', 'author', 'publisher', 'picture','publishing_year','rating','genre'];
        $ids = ['isbn'];
        parent::__construct($tableName, $attributes, $ids);
    }












}