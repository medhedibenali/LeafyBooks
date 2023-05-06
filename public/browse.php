<?php
if(!isset($_GET['tag']))
{
    header('location: index.php');
    die();
}
$tag=$_GET['tag'];
$pageTitle= 'Browse For'.$tag;
require_once dirname(__FILE__,2).'/templates/header.php';
require_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
$bookRepository = new BookRepository();
$tagsRepository = new TagsRepository();
$books=$bookRepository->find();
