<?php
require_once dirname(__FILE__, 2) . '/modules/book_identification/BookRepository.php';
function findBook($ISBN)
{
    $bookRepo = new BookRepository();
    $book = $bookRepo->findOne(["ISBN" => $ISBN]); //find book with $ISBN id*
    return $book;
}

