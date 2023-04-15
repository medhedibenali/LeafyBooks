<?php
include_once dirname(__FILE__, 3) . '/modules/search/BooksRepository.php';
require_once dirname(__FILE__,3) . '/modules/auth/UserRepository.php';
$bookRepo = new BookRepository();
$userRepo= new UserRepository();
if (!isset($_GET['search'])) {
    return;
}

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$results_per_page = 1;
$page_first_result = ($page - 1) * $results_per_page;

$search = htmlspecialchars($_GET['search']);
$books = $bookRepo->findByTitleOrAuthor($search);
$number_of_result = sizeof($books);
$number_of_page = ceil($number_of_result / $results_per_page);
$books = $bookRepo->findByTitleOrAuthorLimit($search, $page_first_result, $results_per_page);

?>