<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$UserRepo = new UserRepository();
$ReadActRepo = new ReadActRepository();
$BookRepo = new BookRepository();
$user = $UserRepo->find(array("username" => $_GET['username']));

// User does not exist
if (!$user) {
    $errorMessage = "The requested user was not found";
    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    $redirectUrl .= "?error=" . urlencode($errorMessage);

    header("Location: $redirectUrl");
    exit();
}

if ($_GET['status'] == 'currently_reading') {
    $status = 'Currently Reading';
} else if ($_GET['status'] == 'finished_reading') {
    $status = 'Read';
} else if ($_GET['status'] == 'to_read') {
    $status = 'To-Read';
} else {
    $status = 'error';
}
// Status is undefined
if ($status == 'error') {
    $errorMessage = "The requested status for the user was not found";
    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    $redirectUrl .= "?error=" . urlencode($errorMessage);

    header("Location: $redirectUrl");
    exit();
}

$time = (ctype_digit($_GET['time'])) ? (int) $_GET['time'] : -1;
$join_date = new DateTime($user->join_date);
$join_year = $join_date->format('Y');

//Time is not set correctly

if ($time == -1) {
    $errorMessage = "wrong year format";
    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    $redirectUrl .= "?error=" . urlencode($errorMessage);

    header("Location: $redirectUrl");
    exit();
} else if ($time && $time < $join_year) {
    $errorMessage = "The requested year does not exist for user";
    $redirectUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    $redirectUrl .= "?error=" . urlencode($errorMessage);

    header("Location: $redirectUrl");
    exit();
}

// Everything checks out
$pageTitle = "$user->username's stats - LeafyBooks";

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

// Big brain move to inject php into javascript

echo '<script>';

//this is for the username
echo 'const username = "' . $user->username . '";';

// this is for the time
echo 'const time = "' . (isset($_GET['time']) ? $_GET['time'] : 'all') . '";';

// this is for status
echo 'const status = "' . $_GET['status'] . '";';

// this is the base url
echo 'const URL = "stats.php?username=" + username';

echo '</script>';
?>

<!-- Introductory for stats -->
<div class="container" style="width:100%;margin-top:3%;">
    <div class="main-border" style="text-align:center;width:100%;height:230px;">
        <h5 style="margin-top: 2%;margin-bottom:5%;font-family: Script MT Bold;"><?= $user->username ?>'s reading stats</h5>

        <p style="margin-top:2%;margin-left:-20%;">Viewing stats for</p>

        <!-- Book Status Selector -->
        <div class="dropdown" style="margin-top:-4%;margin-left:13%;">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid black;margin-left:-5%;">
                <?= $status ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="#" class="dropdown-item <?= ($_GET['status'] == 'finished_reading') ? 'active' : '' ?>" onClick="redirect('finished_reading')">Read</a>
                <a href="#" class="dropdown-item <?= ($_GET['status'] == 'to_read') ? 'active' : '' ?>" onClick="redirect('to_read')">To-Read</a>
                <a href="#" class="dropdown-item <?= ($_GET['status'] == 'currently_reading') ? 'active' : '' ?>" onClick="redirect('currently_reading')">Currently Reading</a>
            </div>
        </div>

        <p style="margin-top:-2.85%;margin-left:30%;">Books</p>
        <a href=""></a>

        <!-- Time Frame Selector -->
        <div class="dropdown dropup" style="margin-top:2%;">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 1px solid black;">
                <?= (!$time) ? 'All Time' : $time ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="#" class="dropdown-item <?= (!$time) ? 'active' : '' ?>" onClick="redirectTime('0')">All Time</a>
                <?php
                $current_year = date('Y');
                for ($year = $current_year; $year >= $join_year; $year--) {
                    echo '<a href="#" class="dropdown-item ' . (($time == $year) ? 'active' : '') . '" onClick="redirectTime(' . $year . ')">' . $year . '</a>';
                }
                ?>
            </div>

            <!-- Script to handle the status event clicks -->
            <script>
                function redirect(status) {
                    // Redirect as needed WARNING NEEDS ADJUSTMENT AFTER MERGING AND REFACTORING
                    window.location.href = URL + "&status=" + status + "&time=" + time;
                }
            </script>

            <!-- Script to handle choosing time -->
            <script>
                function redirectTime(year) {
                    // Redirect as needed WARNING NEEDS ADJUSTMENT AFTER MERGING AND REFACTORING
                    window.location.href = URL + "&status=" + status + "&time=" + year;
                }
            </script>
        </div>

    </div>
</div>
</div>

<!-- Begin stats -->
<div class="stats" style="width:100%;">
    <!-- First container -->
    <div class="container" style="width:100%;margin-top:3%;">
        <div class="main-border" style="text-align:center;width:100%;height:3100px;">
            <h5 style="margin-top: 2%;font-family: Script MT Bold;"><?= $status ?></h5>
            <?php
            if (!$time) {
                $StatusBooks = $ReadActRepo->find(['username' => $user->username, 'status' => $_GET['status']]);
                $result = count($StatusBooks);
            } else {
                $date = ($_GET['status'] == 'to_read') ? 'start_date' : 'finish_date';
                $StatusBooks = $ReadActRepo->BookCount($_GET['username'], $_GET['status'], $_GET['time']);
                $result = $StatusBooks[0]->Total;
            }
            ?>
            <!-- <a href="#" style="color:#034694;"> -->
            <?= $result ?> Books
            <!-- </a> -->
            <?php
            if ($_GET['status'] == 'finished_reading') {
                $TotalPages = $ReadActRepo->getTotalPages($_GET['username'], $_GET['status'], ($_GET['time'] == '0') ? '' : $_GET['time']);
                $totalPages = (int)$TotalPages[0]->Total;
                echo '<p>' . $totalPages . ' pages</p>';
            }
            ?>
            <hr style="margin-left: auto;margin-right:auto;width:90%;">

            <!-- First pie chart -->

            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>

            <p id="comment1" style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">

            <!-- Second pie chart -->

            <figure class="highcharts-figure">
                <div id="second-container"></div>
            </figure>

            <p id="comment2" style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">

            <!-- Fourth pie chart -->
            <figure class="highcharts-figure">
                <div id="fourth-container"></div>
            </figure>

            <p id="comment4" style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">

            <!-- begin treatment -->
            <script>
                // Radialize Colors
                Highcharts.setOptions({
                    colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
                        return {
                            radialGradient: {
                                cx: 0.5,
                                cy: 0.3,
                                r: 0.7
                            },
                            stops: [
                                [0, color],
                                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                            ]
                        };
                    })
                });

                // Ajax function to get data
                function fetchPieChartData(url, callback) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', url, true);
                    xhr.onload = function() {
                        if (this.status == 200) {
                            if (this.responseText) {
                                var responseData = JSON.parse(this.responseText);
                                var parsedData = Object.keys(responseData).map(function(key) {
                                    return {
                                        name: key,
                                        y: parseFloat(responseData[key])
                                    };
                                });
                                callback(parsedData);
                            }
                        }
                    };
                    xhr.send();
                }

                // Generate the needed charts
                function generatePieChart(container, title, data) {
                    Highcharts.chart(container, {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: title,
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },

                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    connectorColor: 'silver'
                                }
                            }
                        },
                        series: [{
                            name: 'Share',
                            data: data,
                            point: {
                                events: {
                                    click: function() {
                                        // Take me to book section with associated title
                                        // required url is of the form /books/{this.name} where this.name is the category search parameter
                                        window.location.href = "browse.php?tag=" + this.name;
                                    }
                                }
                            }
                        }]
                    });
                }
                // generic get parameters for all request urls
                RequestUrl = "PieChart.php?username=" + username + "&status=" + status + "&time=" + time;
                redirectUrl = "php/";

                // Generate first pie chart
                // Need to modify the url when refactoring
                fetchPieChartData(redirectUrl + "First" + RequestUrl, function(data) {
                    if (data.length > 0) {
                        generatePieChart('container', 'Mood', data);
                    } else {
                        var element = document.getElementById('comment1');
                        element.innerHTML = "No data available to draw the pie chart";
                    }
                });

                // Generate second pie chart
                fetchPieChartData(redirectUrl + "Second" + RequestUrl, function(data) {
                    if (data.length > 0) {
                        generatePieChart('second-container', 'Pace', data);
                    } else {
                        var element = document.getElementById('comment2');
                        element.innerHTML = "No data available to draw the pie chart";
                    }
                });

                // // Generate third pie chart
                fetchPieChartData(redirectUrl + "Third" + RequestUrl, function(data) {
                    if (data.length > 0) {
                        generatePieChart('third-container', 'Pages', data);
                    } else {
                        var element = document.getElementById('comment3');
                        element.innerHTML = "No data available to draw the pie chart";
                    }
                });

                fetchPieChartData(redirectUrl + "Fourth" + RequestUrl, function(data) {
                    if (data.length > 0) {
                        generatePieChart('fourth-container', 'Fiction/Non-Fiction', data);
                    } else {
                        var element = document.getElementById('comment4');
                        element.innerHTML = "No data available to draw the pie chart";
                    }
                });
            </script>

            <!-- treatment ended -->

            <!-- First Bar chart -->
            <h4 style="font-weight:630;">Genres</h4>
            <div>
                <canvas id="first-chart"></canvas>
            </div>
            <p id="bar1" style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the books</em></p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">

            <!-- Second Bar chart -->
            <?php
            if ($_GET['status'] == 'finished_reading') {
                $result = 'Most Read Authors';
            } else {
                $result = 'Most Featured Authors';
            }
            ?>
            <h4 style="font-weight:630;"><?= $result ?></h4>
            <div>
                <canvas id="second-chart"></canvas>
            </div>
            <p id="bar2" style="margin-top:5%;font-size:14px;"><em>Click on any chart segment to view the author</em></p>
        </div>
    </div>

    <!-- Second container -->
    <div class="container" style="width:100%;margin-top:3%;">
        <div class="main-border" style="text-align:center;width:100%;height:870px;margin-bottom:50px;">
            <h5 style="margin-top: 2%;font-family: Script MT Bold;">Star Ratings</h5>
            <p>1337 Reviews</p>
            <hr style="margin-left: auto;margin-right:auto;width:90%;opacity:10;">
            <?php
            $average = $BookRepo->getAvgBookRating($user->username, $_GET['status'], $_GET['time']);
            ?>
            <p style="font-size:20px;margin-top:3%;">Average Rating: <?= $average ?> &#11088</h3>

                <!-- Third Bar Chart -->
            <div>
                <canvas id="third-chart"></canvas>
            </div>
            <p id="bar3" style="margin-top:5%;font-size:14px;"></p>

            <!-- Generate bar charts -->
            <script>
                // Ajax to get author id
                function fetchAuthorId(author_name, callback) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'php/GetAuthorId.php?author=' + author_name, true);
                    xhr.onload = function() {
                        if (this.status == 200) {
                            var responseData = JSON.parse(this.responseText);
                            callback(responseData[author_name]);
                        }
                    }

                    xhr.send();

                }

                // Ajax function to get data
                function fetchBarChartData(url, callback) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', url, true);
                    xhr.onload = function() {
                        if (this.status == 200) {
                            if (this.responseText) {
                                var responseData = JSON.parse(this.responseText);

                                // Decode the star symbols in the keys
                                var decodedData = {};
                                Object.keys(responseData).forEach(function(key) {
                                    var decodedKey = key.replace(/\\u\{([\d\w]+)\}/g, function(match, hex) {
                                        return String.fromCodePoint(parseInt(hex, 16));
                                    });
                                    var value = responseData[key];
                                    decodedData[decodedKey] = value;
                                });
                                callback(decodedData);
                            }
                        }
                    };
                    xhr.send();
                }

                function generateChart(id, labels, label, data, isHorizontal, enableRedirect, isAjaxDependent) {
                    const ctx = document.getElementById(id);

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: label,
                                data: data,
                                borderWidth: 1,
                                backgroundColor: 'rgba(54, 162, 235, 0.3)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                hoverBackgroundColor: 'rgba(54, 162, 235, 0.6)',
                                hoverBorderColor: 'rgba(54, 162, 235, 1)'
                            }]
                        },
                        options: {
                            onClick: function(evt, item) {
                                if (item.length > 0 && enableRedirect) {
                                    const index = item[0].index;
                                    selectedValue = labels[index];
                                    if (!isAjaxDependent) {
                                        window.location.href = 'browse.php?tag=' + selectedValue;
                                    } else {
                                        fetchAuthorId(selectedValue, function(id) {
                                            window.location.href = 'author.php?id=' + id;
                                        })
                                    }

                                }
                            },
                            indexAxis: isHorizontal ? 'y' : 'x',
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
                const label = "Number of books";

                // generic get parameters for all request urls
                RequestUrl = "BarChart.php?username=" + username + "&status=" + status + "&time=" + time;

                fetchBarChartData(redirectUrl + 'First' + RequestUrl, function(data) {
                    if (Object.keys(data).length > 0) {
                        generateChart('first-chart', Object.keys(data), label, Object.values(data), true, true, false);
                    } else {
                        var element = document.getElementById('bar1');
                        element.innerHTML = "No data available to draw the pie chart";
                    }
                });

                fetchBarChartData(redirectUrl + 'Second' + RequestUrl, function(data) {
                    if (Object.keys(data).length > 0) {
                        generateChart('second-chart', Object.keys(data), label, Object.values(data), true, true, true);
                    } else {
                        var element = document.getElementById('bar2');
                        element.innerHTML = "No data available to draw the pie chart";
                    }
                });

                fetchBarChartData(redirectUrl + 'Third' + RequestUrl, function(data) {
                    if (Object.keys(data).length > 0) {
                        generateChart('third-chart', Object.keys(data), label, Object.values(data), false, false, false);
                    } else {
                        var element = document.getElementById('bar3');
                        element.innerHTML = "No data available to draw the pie chart";
                    }
                });
            </script>
        </div>
    </div>
</div>

<?php
require TEMPLATES_PATH . '/footer.php';
