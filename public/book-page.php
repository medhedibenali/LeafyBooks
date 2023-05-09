<?php
if(!isset($_SESSION))
{session_start();}

require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

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

$pageTitle = $book->title;

$stylesheets = array(
    'css/book-identity.css',
    'css/static-rating.css',
    'css/book-template.css'
);

require TEMPLATES_PATH . '/header.php';

$authorRepository = new AuthorRepository();
$author = $authorRepository->find(['id' => $book->author]);

$tagRepository = new TagsRepository();
$bookByTags = $tagRepository->find(['isbn' => $isbn]);

$userRepository = new UserRepository();
$user = $userRepository->find(['username' => $_SESSION['username']]);

$userReviewsRepository = new UserReviewsRepository();
$reviewsCount = count($userReviewsRepository->find(['isbn' => $isbn]));
?>
<!--   info about the book-->
<div class="container">
    <div class="ImagePos">
        <img id="cover" src="img/books/<?= $book->image ?>" />
        <div>
            <?php
            require TEMPLATES_PATH . '/add-to-list.php';
            ?>
        </div>
    </div>

    <div class="box1">
        <h1 style="font-family: 'Britannic Bold';font-size: 50px;"><?= $book->title ?></h1>
        <!--NUMBER OF PAGES AND PUBLISHING DATE  -->
        <p style="font-family:  'Times New Roman, serif'">
            <?= $book->pages . ' pages' ?>
            <br>
            First published <?= $book->publishing_year ?>
        </p>
        <div style="font-size: 20px;font-family: 'DecoType Naskh';">
            <?= $author->pen_name ?>
        </div>
        <div style="font-size: 20px;font-family: 'DecoType Naskh';">
            <?= $book->publisher ?>
        </div>
        <div id="synopsis">
            <?= $book->synopsis ?>
        </div>
        <!--        book average rating-->
        <?php
        $percentage = ($book->rating ?? 0) * 20;
        ?>
        <div class="flex-box-no-space">

            <div class="rating-in-stars">
                <?php
                require TEMPLATES_PATH . '/rating-static-percentage.php';
                ?>
            </div>
            <div class="rating-in-digits" class="AvgReviews">

                (<?= $reviewsCount ?> review<?= ($reviewsCount != 1) ? 's' : ''; ?>)
                <?= "  " . $book->rating ?>
            </div>

        </div>
        <br>
        <p style="color: grey;margin-right: 10px;font-family: 'DecoType Naskh';font-size: 20px">Tags </p>
        <ul id="liste" style="list-style: none;">
            <?php
            foreach ($bookByTags as $bookByTag) {
            ?>
                <li id="lii"><?= $bookByTag->tag ?></li>
            <?php
            }
            ?>
        </ul>
        <div class="AboutAuthor">
            <h2>
                About the author
            </h2>
            <img id="authorpic" src="img/authors/<?= $author->image ?>"> <?= $author->pen_name ?>
            <br><br>
            <?= $author->bio ?>
        </div>
        <hr>
        <br>
        <!--    rating statistics-->
        <?php
        require TEMPLATES_PATH . '/rating-statistics.php';
        ?>
        <br>
        <!--similar books-->
        <div class="ReadersEnjoy">
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
        <hr>
        <div class="Ratings-reviews">
            <h2 style="font-family:'DecoType Naskh';">
                Ratings & Reviews
            </h2>
            <img src="img/users/<?= $user->image ?>" id="userpic">
            <br>
            <p id="question">
                what do you think, <?= $user->username ?>?
            </p>

            <div class="rating-portion">
                <?php
                require TEMPLATES_PATH . '/rating-template.php';
                if (isset($_SESSION['username'])) {
                ?>
                    <button class="writereview">
                        <a href="#reviewing" style="text-decoration: none;color:whitesmoke">Write a review</a>
                    </button>
                <?php
                }
                ?>

            </div>
            <br>
            <!-- reviews-->
            <?php
            require TEMPLATES_PATH . '/reviews.php';
            ?>
        </div>
        <br>
        <br>
        <!--    review form-->
        <div>
            <?php
            require TEMPLATES_PATH . '/reviewing-template.php';
            ?>
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
