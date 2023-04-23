<?php
require_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
$ISBN=htmlspecialchars($_GET['ISBN']);
function getSimilarBooks()
{
    $ISBN=htmlspecialchars($_GET['ISBN']);
    $BookRepository=new BookRepository();
    $ActualBook=$BookRepository->find(["ISBN"=>$ISBN]);
    $genre=$ActualBook->genre;
    $books=$BookRepository->find(["genre"=>trim($genre)]);
    return $books;

}


//header("Location: " . $_SERVER['HTTP_REFERER']);


