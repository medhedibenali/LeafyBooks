<?php

$pageTitle = 'Search';
require_once dirname(__FILE__, 2) . '/templates/header.php';
require_once 'php/SearchManager.php';?>
<div>
    <form action="search.php" method="get">
        <button  class="list-group-item" value="all" name="type">Search All books</button>
        <button class="list-group-item" value="title" name="type">Search by book title</button>
        <button class="list-group-item" value="author" name="type">All books</button>
        <button class="list-group-item" value="user" name="type">All Users</button>
    </form>
    <ul class="list-group">
        <?php
        foreach ($books as $book) {
        $cover = $book->cover;
        $title = $book->title;
        $synopsis = $book->synopsis;
        $author = $book->author;
        require dirname(__FILE__,2).'/templates/bookItem.php';
        } ?>
    </ul>
</div>
<div>
    <?php
    for ($page = 1; $page <= $number_of_page; $page++) { ?>
        <a href=<?= "search.php?page=$page&search=$search" ?>><?= $page ?></a>
    <?php } ?>
</div>

<?php
require_once dirname(__FILE__, 2) . '/templates/header.php';
