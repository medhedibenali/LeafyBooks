<?php
require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$bookRepo = new BookRepository();
$userRepo = new UserRepository();

if (!isset($_GET['search'])) {
    header('Location: index.php');
    die();
}

//logic for books
if (!isset($_GET['booksPage'])) {
    $booksPage = 1;
} else {
    $booksPage = $_GET['booksPage'];
}

$booksResults_per_page = 8;
$booksPage_first_result = ($booksPage - 1) * $booksResults_per_page;

$search = htmlspecialchars($_GET['search']);
$books = $bookRepo->findByTitleOrAuthor($search);
$booksNumber_of_result = sizeof($books);
$booksNumber_of_page = ceil($booksNumber_of_result / $booksResults_per_page);
$books = $bookRepo->findByTitleOrAuthorLimit($search, $booksPage_first_result, $booksResults_per_page);

//logic for users
if (!isset($_GET['usersPage'])) {
    $usersPage = 1;
} else {
    $usersPage = $_GET['usersPage'];
}

$usersResults_per_page = 6;
$usersPage_first_result = ($usersPage - 1) * $usersResults_per_page;
$users = $userRepo->findByUsernameOrFullName($search);
$usersNumber_of_result = sizeof($users);
$usersNumber_of_page = ceil($usersNumber_of_result / $usersResults_per_page);
$users = $userRepo->findByUsernameOrFullNameLimit($search, $usersPage_first_result, $usersResults_per_page);
