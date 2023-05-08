<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

class BookRepository extends Repository
{

    public function __construct()
    {
        $tableName = 'books';
        $attributes = ['isbn', 'title', 'author', 'publisher', 'image', 'synopsis', 'publishing_year', 'rating', 'genre', 'pages'];
        $ids = ['isbn'];
        parent::__construct($tableName, $attributes, $ids);
    }
}
