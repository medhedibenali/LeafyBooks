<?php
require_once dirname(__FILE__, 3) . '/modules/autoloader.php';
$isbn = htmlspecialchars($_GET['isbn']);
function getSimilarBooks()
{
    $isbn = htmlspecialchars($_GET['isbn']);
    $bookRepository = new BookRepository();
    $actualBook = $bookRepository->find(["isbn" => $isbn]);
    $genre = $actualBook->genre;
    $books = $bookRepository->find(["genre" => trim($genre)]);
    return $books;
}
function getTags($isbn)
{


}
