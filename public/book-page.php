<?php
session_start();

require_once dirname(__FILE__, 2) . '/config/config.php';

$pageTitle = "Book Page";

$stylesheets = array(
    'css/book-identity.css',
    'css/static-rating.css'
);

require TEMPLATES_PATH . '/header.php';

$isbn = htmlspecialchars($_GET['isbn']);
require_once dirname(__FILE__) . '/php/BookInfoDump.php'
?>
<!--   info about the book-->
<div class="container">
    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>
    <div>
        <img src="<?= $picture ?>" />
    </div>
    <div>
        title:<?= $title ?>
    </div>
    <div>
        author: <?= $author ?>
    </div>
    <div>
        publisher:<?= $publisher ?>
    </div>
    <!--    book average rating-->
    <?php
    $percentage = ($rating) * 20;
    require TEMPLATES_PATH . '/rating-static-percentage.php';
    ?>
    <div>
        (<?= $nbRatings ?> )
    </div>
    <div>
        synopsis :<?= $book->synopsis ?>
    </div>
    <?php
    require TEMPLATES_PATH . '/add-to-list.php';
    ?>
    <div class="AboutAuthor">
        <h4>
            About the author
        </h4>
        <?= $bio ?>
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
        <br>
        <!-- reviews-->
        <?php
        require_once dirname(__FILE__) . '/php/ProcessReviews.php';
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
