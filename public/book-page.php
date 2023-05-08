<?php
session_start();

require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$pageTitle = "Book Page";

$stylesheets = array(
    'css/book-identity.css',
    'css/static-rating.css'
);

require TEMPLATES_PATH . '/header.php';

$isbn = htmlspecialchars($_GET['isbn'] ?? '');

if ($isbn === '') {
    header('Location: index.php');
    die();
}

$bookRepository = new BookRepository();
$book = $bookRepository->find(['isbn' => $isbn]);

if ($book === false) {
    header('Location: index.php');
    die();
}

$authorRepository = new AuthorRepository();
$author = $authorRepository->find(['id' => $book->author]);

$userReviewsRepository = new UserReviewsRepository();
$reviewsCount = count($userReviewsRepository->find(['isbn' => $isbn]));
?>
<!--   info about the book-->
<div class="container">
    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>
    <div>
        <img src="img/books/<?= $book->image ?>" />
    </div>
    <div>
        title: <?= $book->title ?>
    </div>
    <div>
        author: <?= $author->pen_name ?>
    </div>
    <div>
        publisher: <?= $book->publisher ?>
    </div>
    <!--    book average rating-->
    <?php
    $percentage = ($book->rating ?? 0) * 20;
    require TEMPLATES_PATH . '/rating-static-percentage.php';
    ?>
    <div>
        (<?= $reviewsCount ?> review<?= ($reviewsCount != 1) ? 's' : '' ?>)
    </div>
    <div>
        synopsis: <?= $book->synopsis ?>
    </div>
    <?php
    require TEMPLATES_PATH . '/add-to-list.php';
    ?>
    <div class="AboutAuthor">
        <h4>
            About the author
        </h4>
        <?= $author->bio ?>
    </div>
    <!--    rating statistics-->
    <?php
    require TEMPLATES_PATH . '/rating-statistics.php'
    ?>
    <!--similiar books-->
    <h4 class=you-might-also-like>
        You might also like
    </h4>
    <div class="flex-box">
        <?php
        require TEMPLATES_PATH . '/similar-books.php';
        ?>
    </div>
    <div class="Ratings-reviews">
        <h4>
            Ratings & Reviews
        </h4>
        <!-- reviews-->
        <?php
        require TEMPLATES_PATH . '/reviews.php';
        ?>
    </div>
    <!--    review form-->
    <div class="rating-portion">
        <?php
        require TEMPLATES_PATH . '/rating-user-input.php';
        ?>
    </div>
</div>

<?php

$scripts = array(
    'js/book-identity.js'
);

require TEMPLATES_PATH . '/footer.php';
