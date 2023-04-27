<?php
//we need this for the reviews later
session_start();
$_SESSION['username']='hdida';
require_once '../templates/header.php';
?>
<link rel="stylesheet" href="css/book-template.css">
<body>

<?php
$ISBN = htmlspecialchars($_GET['ISBN']);
require '../public/php/book-info-dump.php'
?>

<div class="container">
    <!--BOOK COVER & BUTTON TO ADD  -->
        <div class="ImagePos">
            <img id="cover" src="<?=$picture?>"/>
            <div >
                <?php
                require_once '../public/add-to-list.php';
                ?>
            </div>

        </div>
    <!--INFO ABOUT THE BOOK   -->
        <div class="box1">

            <h1 style="font-family: 'Britannic Bold';font-size: 50px"><?=$title;?></h1>

            <!--NUMBER OF PAGES AND PUBLISHING DATE  -->
            <p style="font-family:  'Times New Roman, serif'">
                <?=$book->page_number?>
                <br>
                First published <?=$book->publishing_year?>
            </p>
            <!--AUTHOR NAME ?? -->
            <p style="font-size: 20px;font-family: 'DecoType Naskh';"><?=$author;?></p>

<!-- note to self add publisher somewhere-->

    <!--BOOK AVERAGE RATING -->
    <div class="AVGrating">
        <?php
            $percentage=($rating)*20;
           require_once dirname(__FILE__,2).'/tmp/rating-static-percentage.php';
        ?>
     (<?=$NbRatings?> )
    </div>
     <!--SYNOPSIS -->
    <div id="synopsis"><?=$book->synopsis;?></div>

    <p style="color: grey;margin-right: 10px;font-family: 'DecoType Naskh';font-size: 20px">Genres </p>
            <ul id="liste" style="list-style: none;">

                <li id="lii" >Mystery</li>
                <li id="lii">Thriller</li>
                <li id="lii">Fiction</li>
                <li id="lii">Crime</li>
                <li id="lii">Suspense</li>
                <li id="lii">Murder</li>
            </ul>

    <!--AUTHOR INFO -->
    <div class="author">

        <h5 style="font-weight: bold"> About the author</h5>
        <img id="authorpic" src="<?=$author->picture?>"> <?=$author->pen_name?>
        <br><br>
        <?=$bio?>

    </div>

    <!--rating stats-->

<!--    <form  class="OnLoad" action="../public/php/process-rating-statistics.php?">-->
<!--        <input type="hidden" name="ISBN" value="--><?php //=$ISBN?><!--">-->
<!--    </form>-->
    <?php require_once "../tmp/rating-statistics.php" ?>

  <!--RECOMMENDING LIST OF BOOKS   -->

    <form  class="OnLoad2" action="../public/php/process-similar-books.php">
        <input type="hidden" name="ISBN" value="<?=$ISBN?>">
    </form>
    <div style="margin-top: 70px;">
                <h2 style="font-family:'DecoType Naskh';font-style:italic "> Readers also enjoy</h2>
    </div>
    <div class="flex-box">
    <?php
        require_once dirname(__FILE__, 2) . '/public/similar-books.php';
    ?>
    </div>

     <!--REVIEWS STATS  -->

<div >

            HELLO
    <br>
    <?php
    require_once dirname(__FILE__, 2) . '/public/php/reviews.php';
    ?>
</div>

<!--    I need to add the condition that there's a connected user to post a review!!-->

<!--    review form-->
<hr style="margin-top: 7em">
<div class="rating-portion"
    <h5>
        what do you think?
    </h5>

<?php
    require_once("../tmp/rating-user-input.php");
?>
</div>
</div>
</div>
</div>
</div>
<script src="book-identity.js"></script>
</body>
</html>






