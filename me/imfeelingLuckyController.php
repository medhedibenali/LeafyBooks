<?php
include_once dirname(__FILE__,2).'/modules/search/BooksRepository.php';
$bookRepo=new BookRepository();
$books= $bookRepo->find();
$random=rand(0,sizeof($books)-1);
var_dump($books[$random]->isbn);
header("Location: ");
exit();