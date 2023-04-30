<?php
session_start();

?>
<!doctype html>
<html lang="en">

<?php
require_once "../templates/header.php";
?>
<link rel="stylesheet" href="node_modules/bootswatch/dist/lux/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/bootstrap/dist/js/bootstrap.bundle.js">
<link rel="stylesheet" href="node_modules/bootstrap/dist/js/bootstrap.min.js">
<link rel="stylesheet" href="css/book-identity.css">
<link rel="stylesheet" href="css/static-rating.css">
<link rel="stylesheet" href="css/book-template.css">
<title> Book Page</title>


<div>
<?php
$isbn = htmlspecialchars($_GET['isbn']);
require '../public/php/BookInfoDump.php' ;
require dirname(__FILE__,2).'/modules/autoloader.php';
$tagRepository=new TagsRepository();
$bookByTags=$tagRepository->find(['isbn'=>$isbn]);
$userRepository=new UserRepository();
$user=$userRepository->find(['username'=>$_SESSION['username']])
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
        <p style="font-family:  'Times New Roman, serif'">
            <?=$book->page_number.' pages'?>
            <br>
            First published <?=$book->publishing_year?>
        </p>
    <div style="font-size: 20px;font-family: 'DecoType Naskh';">
         <?= $author ?>
    </div>
    <div style="font-size: 20px;font-family: 'DecoType Naskh';">
        <?= $publisher ?>
    </div>
    <div id="synopsis">
        <?= $book->synopsis ?>
    </div>
        <!--        book average rating-->
        <?php
        $percentage = ($book->rating)*10;
         ?>
        <div class="flex-box-no-space">

            <div class="rating-in-stars">
                <?php
                require dirname(__FILE__, 2) . '/templates/rating-static-percentage.php';
                ?>
            </div>
            <div class="rating-in-digits" style="font-size:30px ; font-weight: bold; padding-left: 4%">
                <?php
                echo "  ".$book->rating;
                ?>
            </div>
            <div class="number-of-ratinsgs" style="font-size:15px ; padding:2% 0 0 4%;color: gray">
                <?php
                echo "(".$nbRatings.')';
                ?>
            </div>
        </div>

        <br>

    <p style="color: grey;margin-right: 10px;font-family: 'DecoType Naskh';font-size: 20px">Tags </p>
    <ul id="liste" style="list-style: none;">
        <?php
        foreach ($bookByTags as $bookByTag)
        {
            ?>
        <li id="lii"><?=$bookByTag->tag?></li>
        <?php
        }
        ?>
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
     <?php require_once dirname(__FILE__,2).'/templates/rating-statistics.php'?>
        <br>
        <br>
        <br>
        <br>
        <br>
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
         <img src="<?=$user->picture?>" id="userpic">
        <br>
        <p id="question">
            what do you think ,<?= $_SESSION['username'] ?> ?
        </p>

        <div class="rating-portion">
            <?php
                require_once dirname(__FILE__,2).'/templates/rating-template.php';
            ?>
            <button onclick="scrollTobottom()" class="writereview">Write a review</button>
        </div>
        <!-- reviews-->
        <p style=" display: flex;justify-content: center;">
        </p>
        <?php
        require_once dirname(__FILE__, 2) . '/public/php/ProcessReviews.php';
        ?>

    </div>
<!--    review form-->
<div class="reviewing-portion">
    <?php
    require_once("../templates/reviewing-template.php");
    ?>
</div>
</div>

</div>
</div>
<script src="js/book-identity.js"></script>

</body>
</html>

