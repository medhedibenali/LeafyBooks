<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

function getSimilarBooks($isbn)
{
    $bookRepository = new BookRepository();
    $actualBook = $bookRepository->find(["isbn" => $isbn]);
    $genre = $actualBook->genre;
    $books = $bookRepository->find(["genre" => trim($genre)]);
    return $books;
}
