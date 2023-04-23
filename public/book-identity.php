<?php
//we need this for the reviews later
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootswatch/dist/lux/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/book-identity.css"/>


    <title>Book identity</title>
</head>
<body>
<?php
$ISBN = htmlspecialchars($_GET['ISBN']);

?>
<!--   info about the book-->
<div class="container">
    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>
    <?=require '../public/php/book-info-dump.php'?>

        <div>
            <img src="<?=$picture?>"/>
        </div>
        <div>
            <div>
                title :<?=$title;?>
            </div>
        </div>
        <div>
            <div>
                author: <?=getAuthorPenName($ISBN);?>
            </div>
        </div>
        <div>
            <div>
                Publisher :<?=$publisher;?>
            </div>
        </div>
    <!--    book average rating-->

    <?php
        $percentage=($rating)*20;
       require_once dirname(__FILE__,2).'/tmp/rating-static-percentage.php';
    ?>

            <div>
                Synopsis :<?=$book->synopsis;?>
            </div>


    <form id="addToList" action="php/add-to-list-process.php" method="post">
        <select id="actionOnBook" name="answer">
            <option value="default"></option>
            <option value="currentlyreading">currently reading</option>
            <option value="finishedreading">read</option>
            <option value="toread">want to read</option>
        </select>
        <input type="hidden" name="ISBN" value="<?=$ISBN?>">
    </form>
    <br>
    <br>

    <div class="AboutAuthor">
        <h4>
            About the author
        </h4>
        <?=getAuthorBio($ISBN)?>
    </div>



    <!--rating stats-->

    <form  class="OnLoad" action="../public/php/process-rating-statistics.php?">
        <input type="hidden" name="ISBN" value="<?=$ISBN?>">
    </form>
    <?php require_once "../tmp/rating-statistics.php" ?>


    <!--similiar books-->
    <form  class="OnLoad2" action="../public/php/process-similar-books.php">
        <input type="hidden" name="ISBN" value="<?=$ISBN?>">
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
    require_once dirname(__FILE__, 2) . '/public/php/reviews.php';
    ?>
</div>




<!--    I need to add the condition that there's a connected user to post a review!!-->

<!--    review form-->

<div class="rating-portion"
    <h5>
        what do you think?
    </h5>
    <!--    Rating Stars-->

    <?php
    require_once("../tmp/rating-user-input.php");
    ?>


</div>
</div>
</div>
<script src="book-identity.js"></script>
</body>
</html>






