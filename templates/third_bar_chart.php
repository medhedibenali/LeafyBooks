<?php
include_once "../modules/autoloader.php";

$user = $_GET['username'];
$status = $_GET['status'];
$time = $_GET['time'];

$BookRepo = new BookRepository();
// Getting stat data for my first pie chart  

// Modify each key with their number of occurences in the database
// Still need to rewrite this query to respect the status and the year indicated
$Result = [];
$labels =   array(
    'No Rating',
    '1.0 \u{2B50}',
    '2.0 \u{2B50}',
    '3.0 \u{2B50}',
    '4.0 \u{2B50}',
    '5.0 \u{2B50}'
);

$NoRatingCount = $BookRepo->NoRatingBookCount($user, $status, $time);

$Result['No Rating'] = $NoRatingCount->Total;

for ($i = 1; $i <= 5; $i++) {
    $Count = $BookRepo->RatingBookCount($user, $status, $time, $i);
    $Result[$labels[$i]] = $Count->Total;
}

$jsonData = json_encode($Result);

echo $jsonData;
