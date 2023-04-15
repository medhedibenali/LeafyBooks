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
    <link rel="stylesheet" href="../public/assets/css/book_identity.css"/>


    <title>Book identity</title>
</head>
<body>
<?php
require_once "../modules/book_identification/process_book_identity.php";

$ISBN = htmlspecialchars($_GET['ISBN']);
$book=findBook($ISBN);

?>
<!--   info about the book-->
<div class="container">
    <div class="alert alert-warning">
        <h3>Book Info</h3>
    </div>
    <table>
        <tr>
            <img src="<?=$book->picture?>"/>
        </tr>
        <tr>
            <div>
                title=<?=$book->title;?>
            </div>
        </tr>
        <tr>
            <div>
                author=<?=$book->author;?>
            </div>
        </tr>
        <tr>
            <div>
                Publisher=<?=$book->publisher;?>
            </div>
        </tr>
    </table>


    <!-- reviews-->
    <?php
    foreach (getReviews($ISBN) as $reviewLine)
    {
        ?>
            <img class="pdp" src="<?=getUserPicture($reviewLine->username)?>" alt="userPicture"/>
         <div>
                review by <?=$reviewLine->username?>
        </div>
        <!--the review-->
        <div>
            <?=$reviewLine->review?>
        </div>
    <?php
    }?>



<!--rating a book-->
<!--    I need to add the condition that there's a connected user to post a review!!-->
<div class="alert alert-warning">
    <?= 'share your thoughts about this book'?>;
</div>
<br>

    <br>
    <!-- add review-->
    <?php
        $path=dirname(__FILE__, 2) . '/modules/book_identification/write_a_review.php';

    ?>
<form action="../modules/book_identification/write_a_review.php" method="post">
<!--    rating template-->
    <div class="rating">
        <div class="stars">
            <input type="radio" id="five" name="rate" value="5">
            <label for="five"></label>
            <input type="radio" id="four" name="rate" value="4">
            <label for="four"></label>
            <input type="radio" id="three" name="rate" value="3">
            <label for="three"></label>
            <input type="radio" id="two" name="rate" value="2">
            <label for="two"></label>
            <input type="radio" id="one" name="rate" value="1">
            <label for="one"></label>
            <span class="result"></span>
        </div>
    </div>
    <br>
    <br>
    <br>

<!--    review form-->
<textarea name = "review" rows="10" cols="50"></textarea>
<input type="hidden" name="ISBN" value="<?=$ISBN?>">
<br>
<button type = "submit" >
        Submit
</button >



</div>
</body>
</html>






