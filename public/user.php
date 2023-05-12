<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$UserRepo = new UserRepository();
$UserReviewRepo = new UserReviewsRepository();
$ReadActRepo = new ReadActRepository();
$BookRepo = new BookRepository();
$AuthorRepo = new AuthorRepository();
$user = $UserRepo->find(array("username" => $_GET['username']));

// User does not exist
if (!$user) {
    $errorMessage = "The requested user was not found";
    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    $redirectUrl .= "?error=" . urlencode($errorMessage);

    header("Location: $redirectUrl");
    exit;
}

// User exists
$pageTitle = "$user->username - LeafyBooks";

$stylesheets = array(
    // Google fonts for stats
    array(
        'href' => 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap'
    ),

    // Adding Carousel
    array(
        'href' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
    ),
    'css/user.css'
);

require TEMPLATES_PATH . '/header.php';
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Pie Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Adding Carousel -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Charts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
$user = $UserRepo->find(array("username" => $_GET['username']));
// inject js code
echo '<script>';

//this is for the username
echo 'const username = "' . $user->username . '";';


echo '</script>';

?>

<div class="container" style="margin-bottom: 20px;width:100%;">
    <div class="row" style="width:100%;">
        <div class="col-4" style="display:flex;align-items:flex-start;justify-content: sapce-between;">

            <?php
            // User can choose not to upload a picture, in which we case we provide a generic picture instead
            if ($user->image == NULL) {
                echo '<img id="UserImagePos" src="img/users/unknown_user.jpg" alt="image not found" style="margin-left:50px;margin-right:30px;width:200px;height:200px;">';
            } else {
                echo '<img id="UserImagePos" src="img/users/' . $user->image . '" alt="image not found" style="margin-left:50px;margin-right:30px;width:200px;height:200px;">';
            }
            ?>
            <?php
            // Need number of reviews, number of ratings and the average of ratings
            $RatingStats = $UserReviewRepo->RatingStatistics($user->username);
            $ReviewStats = $UserReviewRepo->ReviewStatistics($user->username);

            $review_number = ($ReviewStats !== false) ? $ReviewStats->review_number : 0;

            $rating_number = ($RatingStats !== false) ? $RatingStats->rating_number : 0;
            $rating_avg = ($RatingStats !== false && $RatingStats->rating_avg) ? $RatingStats->rating_avg : 0;

            ?>
            <p style="margin-top:260px;margin-left:-190px;font-size:15px;color:#034694"><?= $rating_number ?> ratings</p>
            <p style="margin-top:260px;margin-left:5px;font-size:15px;color:#034694">(<?= number_format($rating_avg, 2) ?> avg)</p>
            <p style="margin-top:280px;margin-left:-100px;font-size:15px;color:#034694"><?= $review_number ?> reviews</p>

        </div>

        <div class="col-4">
            <h1 class="username" style="margin-top: 50px;margin-left:-78px;color:#490206; font-family: Script MT Bold; "><?= $user->username ?></h1>
            <hr style="margin-top:105px;margin-left:-80px;opacity:10;">

            <h6 style="margin-left:-85px;color:#490206;">Full name</h1>
                <p style="margin-top:-31px"><?= $user->username . " " . $user->username; ?></p>

                <h6 style="margin-left:-85px;color:#490206;margin-top:-13px;">Details</h1>
                    <p style="margin-top:-31px"><?= $user->location ?></p>

                    <h6 style="margin-left:-85px;color:#490206;margin-top:-13px;">Activity</h1>
                        <p style="margin-top:-31px">Joined on <?= DateTime::createFromFormat('Y-m-d', $user->join_date)->format('F jS, Y') ?></p>

                        <h6 style="margin-left:-85px;color:#490206;margin-top:-13px;">Birthday</h1>
                            <p style="margin-top:-31px"><?= DateTime::createFromFormat('Y-m-d', $user->birthday)->format('F jS, Y') ?></p>

                            <h6 style="margin-left:-85px;color:#490206;margin-top:-10px;">About Me</h1>
                                <div class="bio-container" style="margin-top:-30px;">
                                    <?php
                                    $bio = ($user->bio) ? $user->bio : "Welcome to my profile page!";
                                    ?>
                                    <p class="bio-text"><?= $bio ?></p>

                                </div>
                                <a href="#" class="more-link" style="display:block;color:#034694;">..more</a>

                                <!-- Script to make the more button show more of the bio -->
                                <script>
                                    const BioContainer = document.querySelector('.bio-container');
                                    const BioText = document.querySelector('.bio-text');
                                    const moreLink = document.querySelector(".more-link");

                                    //Maximum length to show the 'more' link
                                    const maxLength = 100;

                                    if (BioText.textContent.length <= maxLength) {
                                        moreLink.style.display = 'none';
                                    }

                                    // this is part of original code
                                    // Hiden extra content initially
                                    //BioContainer.classList.add('hide');

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
                                        height: 70px;
                                        overflow: hidden;
                                    }
                                </style>

        </div>

        <div class="col-4">

        </div>
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
        <div style="width:65%;word-wrap: break-word;">
            <div class="main-border" style="text-align:center;">
                <?php
                // Book actitvity Stats and information
                $ActivityStats = $ReadActRepo->ActivityStastics($user->username, 'currently_reading');
                $ActivityBooks = $ReadActRepo->ActivityBooks($user->username, 'currently_reading', 'image');
                ?>
                <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Currently Reading (<?= $ActivityStats->activity_number ?>)</h5>

                <?php
                if (!$ActivityStats->activity_number) {
                    echo '<h3 style="margin-top:20%;">' . $user->username . ' has not added any books yet</h3>';
                } else {
                ?>
                    <?php
                    // Design measures
                    $i = 0;
                    // Show a maximum of 3 books, and the view all will show all books
                    foreach ($ActivityBooks as $ActivityBook) {
                        echo '<img class="current-read" id="cover" src="img/books/' . $ActivityBook->image . '" alt="not found" style="margin-left:' . $i * 5 . '%;width:182px;height:276px;">';
                        $i = 1;
                    }
                    ?>

                    <div style="display: flex; justify-content: center;margin-bottom: 10%;">
                        <!-- I need this to refer to the book search section -->
                        <a href="my-books.php?status=currently_reading">
                            <button id='view-all' class="button" style="font-family: Script MT Bold;">View All</button>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div style="word-wrap: break-word;width:1%;">
        </div>
        <div style="width:32%;word-wrap: break-word;">
            <div class="side-border" style="text-align:center;">

                <!-- code -->
                <div id="myCarousel" class="carousel slide " data-ride="carousel" data-interval="6000">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0"></li>
                        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ul>

                    <!-- Slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h5 style="margin-top:10%;font-family: Script MT Bold;">Read</h5>

                            <?php
                            echo '<script>';
                            echo 'const status = "' . 'finished_reading' . '";';
                            echo '</script>';
                            ?>

                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                // fetch data
                                var url = "php/UserChart.php?username=" + username + "&status=" + status;

                                function fetchGenreData() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('GET', url, true);
                                    xhr.onload = function() {
                                        if (this.status == 200) {
                                            var responseData = JSON.parse(this.responseText);

                                            // Map response into wanted format
                                            var chartData = Object.entries(responseData).map(function(item) {
                                                return [item[0], parseFloat(item[1])];
                                            });
                                            chartData.unshift(['Genre', 'Number of books']);
                                            drawChart(chartData);
                                        }
                                    };

                                    xhr.send();
                                }

                                function drawChart() {

                                    var data = google.visualization.arrayToDataTable([
                                        ['Genre', 'Number of books'],
                                        ['Action', 11],
                                        ['Adventure', 2],
                                        ['Drama', 2],
                                        ['Mystery', 2],
                                        ['Comedy', 7]
                                    ]);

                                    var options = {
                                        chartArea: {
                                            width: '100%',
                                            height: '100%'
                                        }
                                    };

                                    var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));

                                    chart1.draw(data, options);
                                }
                            </script>
                            <div class="chart-container">
                                <div id="piechart1" style="height:300px;"></div>
                                <div style="display: flex; justify-content: center;margin-top: 23%;">
                                    <a href="<?= "stats.php?username=$user->username&status=finished_reading&time=0" ?>">
                                        <button id='view-all' class="button" style="font-family: Script MT Bold;">Stats</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <h5 style="margin-top:10%;margin-bottom:20%;font-family: Script MT Bold;">to-read</h5>
                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {

                                    var data = google.visualization.arrayToDataTable([
                                        ['Genre', 'Number of books'],
                                        ['Action', 11],
                                        ['Adventure', 2],
                                        ['Drama', 2],
                                        ['Mystery', 2],
                                        ['Comedy', 7]
                                    ]);

                                    var options = {
                                        chartArea: {
                                            width: '100%',
                                            height: '100%'
                                        }
                                    };

                                    var chart1 = new google.visualization.PieChart(document.getElementById('piechart2'));

                                    chart1.draw(data, options);
                                }
                            </script>

                            <div class="chart-container">
                                <div id="piechart2" style="height:300px;"></div>
                                <div style="display: flex; justify-content: center;margin-top: 5%;">
                                    <a href="<?= "stats.php?username=$user->username&status=to_read&time=0" ?>">
                                        <button id='view-all' class="button" style="font-family: Script MT Bold;">Stats</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item ">
                            <h5 style="margin-top:10%;margin-bottom:20%;font-family: Script MT Bold;">current-read</h5>

                            <script type="text/javascript">
                                google.charts.load('current', {
                                    'packages': ['corechart']
                                });
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {

                                    var data = google.visualization.arrayToDataTable([
                                        ['Genre', 'Number of books'],
                                        ['Action', 11],
                                        ['Adventure', 2],
                                        ['Drama', 2],
                                        ['Mystery', 2],
                                        ['Comedy', 7]
                                    ]);

                                    var options = {
                                        chartArea: {
                                            width: '100%',
                                            height: '100%'
                                        }
                                    };

                                    var chart1 = new google.visualization.PieChart(document.getElementById('piechart3'));

                                    chart1.draw(data, options);
                                }
                            </script>

                            <div class="chart-container">
                                <div id="piechart3" style="height:300px;"></div>
                                <div style="display: flex; justify-content: center;margin-top: 5%;">
                                    <a href="<?= "stats.php?username=$user->username&status=currently_reading&time=0" ?>">
                                        <button id='view-all' class="button" style="font-family: Script MT Bold;">Stats</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- end code -->
                    </div>
                </div>
            </div>
        </div>

        <!-- SECOND ROW -->
        <div class="container" style="margin-bottom: 20px;margin-top:5%;">
            <div class="row" style="width:110%">
                <div style="word-wrap: break-word;width:65%">
                    <div class="main-border" style="text-align:center;">
                        <?php
                        // Book actitvity Stats and information
                        $ActivityStats = $ReadActRepo->ActivityStastics($user->username, 'finished_reading');
                        $ActivityBooks = $ReadActRepo->ActivityBooks($user->username, 'finished_reading', 'image');
                        ?>
                        <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Read Recently (<?= $ActivityStats->activity_number ?>)</h5>

                        <?php
                        if (!$ActivityStats->activity_number) {
                            echo '<h3 style="margin-top:20%;">' . $user->username . ' has not added any books yet</h3>';
                        } else {
                        ?>
                            <?php
                            // Design measures
                            $i = 0;
                            // Show a maximum of 3 books, and the view all will show all books
                            foreach ($ActivityBooks as $ActivityBook) {
                                echo '<img class="current-read" id="cover" src="img/books/' . $ActivityBook->image . '" alt="not found" style="margin-left:' . $i * 5 . '%;width:182px;height:276px;">';
                                $i = 1;
                            }
                            ?>

                            <div style="display: flex; justify-content: center;margin-bottom: 10%;">
                                <a href="my-books.php?status=finished_reading">
                                    <button id='view-all' class="button" style="font-family: Script MT Bold;">View All</button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div style="word-wrap: break-word;width:1%;">
                </div>

                <div style="word-wrap: break-word;width:32%;">
                    <div class="side-border" style="text-align:center;">

                        <?php
                        // Book actitvity Stats and information
                        $ActivityStats = $ReadActRepo->ActivityStastics($user->username, 'to_read');
                        $ActivityBooks = $ReadActRepo->ActivityBooks($user->username, 'to_read', 'isbn');
                        ?>

                        <h5 style="margin:10%;font-family: Script MT Bold;">To-Read Pile (<?= $ActivityStats->activity_number ?>) </h5>

                        <?php
                        if (!$ActivityStats->activity_number) {
                            echo '<h3 style="margin-top:43%;">' . $user->username . ' has not added any books yet</h3>';
                        } else {
                        ?>
                            <?php
                            foreach ($ActivityBooks as $ActivityBook) {
                                echo '<ul id="no-bulletpoints" style="text-align:left;margin-left: 10%;margin-bottom:40px;">';
                                $Book = $BookRepo->find(['isbn' => $ActivityBook->isbn]);
                                $Author = $AuthorRepo->find(['id' => $Book->author]);
                                echo '<li style="font-size:17px;"><strong>' . $Book->title . '</strong></li>';
                                echo '<li>' . $Author->pen_name . '</li>';
                                echo '</ul>';
                                echo ' <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">';
                            }
                            ?>

                            <div style="display: flex; justify-content: center;margin-top:15%;">
                                
                                <a href="my-books.php?status=to_read">
                                    <button id='view-all' class="button" style="font-family: Script MT Bold;">View All</button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- THIRD ROW -->
        <div class="container" style="margin-bottom: 20px;margin-top:5%;">
            <div class="row" style="width:110%">
                <div style="word-wrap: break-word;width:99%;">
                    <div class="main-border" style="text-align:center;height:600px;">
                        <?php
                        $Favorites = $UserReviewRepo->find(['username' => $user->username, 'rating' => 5]);
                        ?>
                        <h5 style="margin-top: 5%;margin-bottom:5%;font-family: Script MT Bold;">Favorites (<?= count($Favorites) ?>)</h5>

                        <?php
                        if (!$ActivityStats->activity_number) {
                            echo '<h3 style="margin-top:20%;">' . $user->username . ' has not added any books yet</h3>';
                        } else {
                        ?>

                            <?php
                            // Design measures
                            $i = 0;
                            // Show a maximum of 3 books, and the view all will show all books
                            foreach ($Favorites as $Favorite) {
                                $Book = $BookRepo->find(['isbn' => $Favorite->isbn]);
                                echo '<img class="current-read" id="cover" src="img/books/' . $Book->image . '" alt="not found" style="margin-left:' . $i * 5 . '%;width:182px;height:276px;">';
                                $i = 1;
                            }
                            ?>

                           
                        <?php } ?>
                    </div>
                </div>

                <div style="word-wrap: break-word;width:1%">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require TEMPLATES_PATH . '/footer.php';
