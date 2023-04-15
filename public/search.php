<?php

$pageTitle = 'Search';
require_once dirname(__FILE__, 2) . '/templates/header.php';

include_once dirname(__FILE__, 2) . '/modules/search/BooksRepository.php';
$bookRepo = new BookRepository();
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
$books = $bookRepo->findByTitleOrAuthorLimit($search, $page_first_result, $results_per_page)
?>
<ul class="list-group">
    <?php
    foreach ($books as $book) {
        $cover = $book->cover;
        $title = $book->title;
        $synopsis = $book->synopsis;
        $author = $book->author;
    ?>
        <li class="book list-group-item">
            <img src=<?= $cover ?> class="book_cover" />
            <div class="book_info">
                <a class="book_title"><?= $title ?></a>
                <div class="book_author"> <span>author(s):</span> <?= $author ?></div>
                <div class="book_synopsis"> <span>synopsis:</span> <?= $synopsis ?></div>
            </div>
        </li>
    <?php } ?>
</ul>
<div>
    <?php
    for ($page = 1; $page <= $number_of_page; $page++) { ?>
        <a href=<?= "search.php?page=$page&search=$search" ?>><?= $page ?></a>
    <?php } ?>
</div>

<?php
require_once dirname(__FILE__, 2) . '/templates/header.php';
