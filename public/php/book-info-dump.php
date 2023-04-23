<?php
require dirname(__FILE__,3).'/public/php/process-book-identity.php';
require_once dirname(__FILE__,3).'/public/book-identity.php';
//$ISBN=$_GET['ISBN'];
$book=findBook($ISBN);
$picture=$book->picture;
$title=$book->title;
$author=getAuthorPenName($ISBN);
$publisher=$book->publisher;
$rating=getRating($ISBN);
$synopsis=$book->synopsis;