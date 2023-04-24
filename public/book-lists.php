<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BooksList</title>
    <link rel="stylesheet" href="css/book-identity.css">
</head>
<body>
<!--zeineb's page-->
<?php
/*export to another file*/
require_once dirname(__FILE__, 2) . '/modules/book_identification/BookRepository.php';
require_once"../public/php/process-book-identity.php";


$bookRepo=new BookRepository();
$books=$bookRepo->find();



 foreach ($books as $book)
     {
         ?>


        <div class="bookImage">
            <a href="book-identity.php?ISBN=<?=$book->ISBN?>">
                <img src="<?=$book->picture?>">
            </a>


        </div>
        <div class="bookTitle&Author">
            <p><?=$book->title?></p>
            <p>by <?=getAuthorPenName($book->ISBN)?></p>
        </div>

    <?php

     }

?>

