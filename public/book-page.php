<?php
session_start();
?>
<!doctype html>
<html lang="en">
<?php
require_once "/"
?>
<body>
<?php
$isbn = htmlspecialchars($_GET['isbn']);
require '../public/php/BookInfoDump.php'
?>
<!--   info about the book-->
<div class="container">
    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>
    <div>
        <img src="<?= $picture ?>"/>
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
    require_once dirname(__FILE__, 2) . '/templates/rating-static-percentage.php';
    ?>
    <div>
        (<?= $NbRatings ?> )
    </div>
    <div>
        synopsis :<?= $book->synopsis ?>
    </div>
    <?php
    require_once '../templates/add-to-list.php';
    ?>
    <div class="AboutAuthor">
        <h4>
            About the author
        </h4>
        <?= $bio ?>
    </div>
    <!--    rating statistics-->
    <?php require_once "../templates/rating-statistics.php" ?>
    <!--similiar books-->
    <form class="OnLoad2" action="php/ProcessSimilarBooks.php">
        <input type="hidden" name="isbn" value="<?= $isbn ?>">
    </form>
    <h4 class=you-might-also-like>
        You might also like
    </h4>
    <div class="flex-box">
        <?php
        require_once dirname(__FILE__, 2) . '/public/similar-books.php';
        ?>
    </div>
    <div class="Ratings-reviews"
    <h4>
        Ratings & Reviews
    </h4>
    <br>
    <!-- reviews-->
    <?php
    require_once dirname(__FILE__, 2) . '/public/php/ProcessReviews.php';
    ?>
</div>
<!--    review form-->
<div class="rating-portion">
    <?php
    require_once("../templates/rating-user-input.php");
    ?>
</div>
</div>
</div>
<script src="javascript/book-identity.js"></script>
</body>
</html>
