<?php
session_start();
//$_SESSION['username']='salma';
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$isbn = htmlspecialchars($_GET['isbn']);

require_once MODULES_PATH . '/book_identification/BookInfoDump.php';

$pageTitle = $title;

$stylesheets = array(
    'css/book-identity.css',
    'css/static-rating.css',
    'css/book-template.css'
);

require TEMPLATES_PATH . '/header.php';

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
                require TEMPLATES_PATH . '/add-to-list.php';
                ?>
            </div>
        </div>

        <div class="box1">
            <h1 style="font-family: 'Britannic Bold';font-size: 50px;"><?=$title;?></h1>
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
                    require TEMPLATES_PATH . '/rating-static-percentage.php';
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
                <img id="authorpic" src="img/<?=$authorPic?>"> <?=$author?>
                <br><br>
                <?= $bio ?>
            </div>
            <hr >
            <br>
            <!--    rating statistics-->
            <?php
            require TEMPLATES_PATH .'/rating-statistics.php';
            ?>
            <br>
            <!--similiar books-->
            <div style="display: flex;margin-top: 60%;flex-direction:column;">
                <h2 style="font-family:'DecoType Naskh';font-style:italic ">
                    Readers also enjoy
                </h2>
                <div class="flex-box">
                    <?php
                    require TEMPLATES_PATH . '/similar-books.php';
                    ?>
                </div>
            </div>
            <br>
            <hr >
            <div class="Ratings-reviews">
                <h2 style="font-family:'DecoType Naskh';">
                    Ratings & Reviews
                </h2>
                <img src="img/<?= $user->picture ?>" id="userpic">
                <br>
                <p id="question">
                    what do you think, <?= $user->username ?>?
                </p>

                <div class="rating-portion">
                    <?php
                    require TEMPLATES_PATH . '/rating-template.php';
                    ?>
                    <button  class="writereview">
                        <a href="#reviewing" style="text-decoration: none;color:whitesmoke;">Write a review</a>
                    </button>
                </div>
                <br>
                <!-- reviews-->

                <?php
                require TEMPLATES_PATH . '/reviews.php';
                ?>
            </div>

            <!--    review form-->
            <div class="reviewing-portion" id="reviewing">
                <?php
                require TEMPLATES_PATH . '/reviewing-template.php';
                ?>
            </div>
        </div>

    </div>
    </div>

<?php

$scripts = array(
    'js/book-identity.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js'

);
require TEMPLATES_PATH . '/footer.php';
