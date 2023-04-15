<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/search.css">
    <title>
        <?php
        $pageTitle="search";
        if(isset($pageTitle))
            echo $pageTitle;
        else
            echo "change name pls i beg of you";
        ?>
    </title>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">goodReads</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="../public/search.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<?php
include_once dirname(__FILE__,2).'/modules/search/BooksRepository.php';
$bookRepo=new BookRepository();
if(!isset($_GET['search'])){
    return;
}

if (!isset ($_GET['page']) ) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$results_per_page =1;
$page_first_result = ($page-1) * $results_per_page;

$search=htmlspecialchars($_GET['search']);
$books=$bookRepo->findByTitleOrAuthor($search);
$number_of_result = sizeof($books);
$number_of_page = ceil ($number_of_result / $results_per_page);
$books= $bookRepo->findByTitleOrAuthorLimit($search,$page_first_result ,$results_per_page)
?>
<ul class="list-group">
    <?php
    foreach($books as $book){
        $cover=$book->cover;
        $title=$book->title;
        $synopsis=$book->synopsis;
        $author=$book->author;
        ?>
        <li class="book list-group-item">
            <img src=<?=$cover?> class="book_cover"/>
            <div class="book_info">
                <a class="book_title"><?=$title?></a>
                <div class="book_author"> <span>author(s):</span>  <?= $author?></div>
                <div class="book_synopsis"> <span>synopsis:</span> <?=$synopsis?></div>
            </div>
        </li>
    <?php } ?>
</ul>
<div>
    <?php
    for($page = 1; $page<= $number_of_page; $page++) {?>
        <a href=<?="search.php?page=$page&search=$search"?>><?=$page ?></a>
    <?php }?>
</div>

</body>

</html>


