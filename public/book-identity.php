<?php
//we need this for the reviews later
session_start();
//$_SESSION['username']='hdida';

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
require '../public/php/book-info-dump.php'
?>
<!--   info about the book-->
<div class="container">
    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>

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
                author: <?=$author;?>
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
                (<?=$NbRatings?> )
            </div>
            <div>
                Synopsis :<?=$book->synopsis;?>
            </div>


    <?php
        require_once '../public/add-to-list.php';
    ?>

    <div class="AboutAuthor">
        <h4>
            About the author
        </h4>
        <?=$bio?>
    </div>



    <!--rating stats-->

<!--    <form  class="OnLoad" action="../public/php/process-rating-statistics.php?">-->
<!--        <input type="hidden" name="ISBN" value="--><?php //=$ISBN?><!--">-->
<!--    </form>-->
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


<?php
    require_once("../tmp/rating-user-input.php");
?>
</div>
</div>
</div>
<script src="book-identity.js"></script>
</body>
</html>






