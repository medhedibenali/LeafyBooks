<?php
include_once "../modules/autoloader.php";
$UserRepo = new UserRepository();
$UserReviewRepo = new UserReviewsRepository();
$ReadActRepo = new ReadActRepository();
$BookRepo = new BookRepository();
$AuthorRepo = new AuthorRepository();
$author = $AuthorRepo->find(['id' => $_GET['id']]);

// Author does not exist
if (!$author) {
    $errorMessage = "The requested author was not found";
    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    $redirectUrl .= "?error=" . urlencode($errorMessage);

    header("Location: $redirectUrl");
    exit;
}
?>

<?php
// Author exists
$pageTitle = "$author->pen_name - LeafyBooks";
include_once "../templates/header.php";
?>

<div class="container" style="margin-bottom: 20px;width:100%;">
    <div class="row" style="width:100%;">
        <div class="col-4" style="display:flex;align-items:flex-start;justify-content: sapce-between;">

            <?php
            echo '<img src="' . $author->picture . '" alt="image not found" style="margin-top:18%;margin-left:50px;margin-right:30px;width:270px;height:330px;">';
            ?>

        </div>

        <div class="col-4">
            <h1 class="username" style="margin-top: 50px;margin-left:-20px;color:#490206; font-family: Script MT Bold; "><?= $author->pen_name ?></h1>
            <hr style="margin-top:105px;margin-left:-18px;opacity:10;">

            <h6 style="margin-left:-18px;color:#490206;">First name</h6>
            <p style="margin-top:-8.75%;margin-left:70px;"><?= $author->first_name ?></p>

            <h6 style="margin-left:-18px;color:#490206;">Last name</h6>
            <p style="margin-top:-8.75%;margin-left:70px;"><?= $author->last_name ?></p>

            <h6 style="margin-left:-18px;color:#490206;">Nationality</h6>
            <p style="margin-top:-8.75%;margin-left:70px;"><?= $author->nationality ?></p>

            <h6 style="margin-left:-18px;color:#490206;">Born</h6>
            <p style="margin-top:-8.75%;margin-left:70px;"><?= DateTime::createFromFormat('Y-m-d', $author->birthday)->format('F jS, Y') ?></p>

            <?php
            if ($author->death_day) {
                $birth_date = new DateTime($author->birthday);
                $death_date = new DateTime($author->death_day);

                $interval = $birth_date->diff($death_date);
                $years = $interval->y;
                echo '<h6 style="margin-left:-18px;color:#490206;">Died</h6>';
                echo '<p style="margin-top:-8.75%;margin-left:70px;">' . DateTime::createFromFormat('Y-m-d', $author->death_day)->format('F jS, Y') . ' (aged ' . $years . ')</p>';
            }
            ?>

            <div class="bio-container" style="margin-top:5%;margin-left:-5%;">
                <?php
                echo '<p>' . $author->bio . '</p>';
                ?>
            </div>
            <a href="#" class="more-link" style="display:block;color:#034694;margin-left:-5%;">..more</a>

            <!-- Script to make the more button show more of the bio -->
            <script>
                const BioContainer = document.querySelector('.bio-container');
                const moreLink = document.querySelector(".more-link");

                // Hiden extra content initially
                BioContainer.classList.add('hide');

                moreLink.addEventListener('click', () => {
                    // Toggle hide class on bio-container to show or hide the extra information
                    BioContainer.classList.toggle('hide');

                    // Update the text in more-link
                    if (BioContainer.classList.contains('hide')) {
                        moreLink.textContent = '..more';
                    } else {
                        moreLink.textContent = 'less';
                    }
                });
            </script>

            <style>
                .hide {
                    height: 300px;
                    overflow: hidden;
                }
            </style>

        </div>
        <div class="col-4"> </div>
    </div>
</div>

<div class="container">
    <div class="row" style="width:100%;margin-bottom:20px">
        <div class="col-12">
            <hr style="opacity:10;">
        </div>
    </div>
</div>

<!-- FIRST ROW -->
<div class="container" style="margin-bottom: 20px;">
    <div class="row" style="width:100%;">
        <div style="width:100%;word-wrap: break-word;">
            <div class="main-border" style="text-align:center;height:1200px;margin-bottom:10%;">
                <?php
                // Bring books the author wrote
                $AllBooks = $BookRepo->find(['author' => $author->id]);
                $Books = $BookRepo->find(['author' => $author->id], ['limit' => 3]);

                ?>
                <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Books (<?= count($AllBooks) ?>)</h5>

                <!-- first image row -->
                <div style="display:flex;margin-top:10%;">
                    <?php
                    // Design measures
                    $i = 0;
                    // Show a maximum of 3 books, and the view all will show all books
                    foreach ($Books as $Book) {
                        echo '<figure style="width:33%;box-sizing:border-box;">';
                        echo '<img class="current-read" id="cover" src="' . $Book->picture . '" alt="not found" style="margin-left:' . $i * 5 . '%;width:182px;height:276px;">';
                        echo '<figcaption>' . $Book->title . '</figcaption>';
                        echo '</figure> ';
                        $i = 1;
                    }
                    ?>
                </div>

                <?php
                $Books = $BookRepo->find(['author' => $author->id], ['limit' => 3, 'offset' => 3]);
                if (!$Books) {
                    echo '<div style="display: flex; justify-content: center;margin-top: 75%;">';
                    echo '<button id="view-all" class="writereview" style="font-family: Script MT Bold;">View All</button>';
                    echo '</div>';
                } else {
                ?>

                    <!-- second image row -->
                    <div style="display:flex;margin-top:15%;">
                        <?php
                        // Design measures
                        $i = 0;
                        // Show a maximum of 3 books, and the view all will show all books
                        foreach ($Books as $Book) {
                            echo '<figure style="width:33%;box-sizing:border-box;">';
                            echo '<img class="current-read" id="cover" src="' . $Book->picture . '" alt="not found" style="margin-left:' . $i * 5 . '%;width:182px;height:276px;">';
                            echo '<figcaption>' . $Book->title . '</figcaption>';
                            echo '</figure> ';
                            $i = 1;
                        }
                        ?>
                    </div>
                <?php
                    echo '<div style="display: flex; justify-content: center;margin-top: 7%;">';
                    echo '<a href="#"><button id="view-all" class="writereview" style="font-family: Script MT Bold;">View All</button></a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div style="word-wrap: break-word;width:1%;">
        </div>
    </div>
</div>