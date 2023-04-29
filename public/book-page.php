<?php
session_start();
$_SESSION['username']='hdida';
?>
<!doctype html>
<html lang="en">

<?php
require_once "../templates/header.php";
?>
<link rel="stylesheet" href="node_modules/bootswatch/dist/lux/bootstrap.min.css">
<link rel="stylesheet" href="public/css/header.css">
<link rel="stylesheet" href="css/book-identity.css">
<link rel="stylesheet" href="css/static-rating.css">
<link rel="stylesheet" href="css/book-template.css">
<title> Book Page</title>

<div>
<?php
$isbn = htmlspecialchars($_GET['isbn']);
require '../public/php/BookInfoDump.php'
?>
<!--   info about the book-->
<div class="container">

    <div class="ImagePos">
        <img id="cover" src="<?= $picture ?>"/>
        <div>
        <?php
        require_once '../templates/add-to-list.php';
        ?>
        </div>
    </div>
    <div class="box1">
        <h1 style="font-family: 'Britannic Bold';font-size: 50px"><?=$title;?></h1>
        <!--NUMBER OF PAGES AND PUBLISHING DATE  -->
<!--        <p style="font-family:  'Times New Roman, serif'">-->
<!--            --><?php //=$book->page_number?>
            <br>
            First published <?=$book->publishing_year?>
        </p>
    <div style="font-size: 20px;font-family: 'DecoType Naskh';">
         <?= $author ?>
    </div>
    <div style="font-size: 20px;font-family: 'DecoType Naskh';">
        <?= $publisher ?>
    </div>
    <!--    book average rating-->
    <?php
    $percentage = ($rating) * 20;
    require_once dirname(__FILE__, 2) . '/templates/rating-static-percentage.php';
    ?>
    <div>
        (<?= $nbRatings ?> )
    </div>
    <div id="synopsis">
        <?= $book->synopsis ?>
    </div>
    <p style="color: grey;margin-right: 10px;font-family: 'DecoType Naskh';font-size: 20px">Genres </p>
    <ul id="liste" style="list-style: none;">

       <li id="lii" >Mystery</li>
       <li id="lii">Thriller</li>
       <li id="lii">Fiction</li>
       <li id="lii">Crime</li>
       <li id="lii">Suspense</li>
       <li id="lii">Murder</li>
    </ul>

    <div class="AboutAuthor">
        <h2>
            About the author
        </h2>
        <img id="authorpic" src="<?=$authorPic?>"> <?=$author?>
        <br><br>
        <?= $bio ?>
    </div>
     <br>
    <!--    rating statistics-->
    <div>
       <?php require_once "../templates/rating-statistics.php" ?>
    </div>
    <!--similiar books-->
    <div style="display: flex;margin-top: 70%">
        <form class="OnLoad2" action="php/ProcessSimilarBooks.php">
            <input type="hidden" name="isbn" value="<?= $isbn ?>">
        </form>
        <h2 style="font-family:'DecoType Naskh';font-style:italic ">
            Readers also enjoy
        </h2>
        <div class="flex-box">
            <?php
            require_once dirname(__FILE__, 2) . '/public/similar-books.php';
            ?>
        </div>
    </div>
     <hr >
    <div class="Ratings-reviews">
        <h2 style="font-family:'DecoType Naskh';">
            Ratings & Reviews
        </h2>
         <img src="../public/pictures/catuser.jpg" id="userpic">
        <br>
        <p id="question">
            What do you think ?
        </p>
        <!-- reviews-->
        <p style=" display: flex;justify-content: center;">
        </p>
        <?php
        require_once dirname(__FILE__, 2) . '/public/php/ProcessReviews.php';
        ?>
        <button onclick="scrollTobottom()" class="writereview">Write a review</button>
    </div>
<!--    review form-->
<div class="rating-portion">
    <?php
    require_once("../templates/rating-user-input.php");
    ?>
</div>
</div>
</div>
</div>
<script src="javascript/book-identity.js"></script>
</body>
</html>
