<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$UserRepo = new UserRepository();

$UserReviewRepo = new UserReviewsRepository();
$ReadActRepo = new ReadActRepository();
$BookRepo = new BookRepository();
$AuthorRepo = new AuthorRepository();


$UserReviewRepo = new UserReviewsRepository();
$UserReview = $UserReviewRepo->find(['isbn' => $_GET['isbn']]);
var_dump($UserReview);

