<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$ReadActRepo = new ReadActRepository();

$username = $_GET['username'];
$status = $_GET['status'];
$time = $_GET['time'];

// Getting stat data for my first pie chart  
$genres = [
    'action' => 0,
    'fantasy' => 0,
    'thriller' => 0,
    'young_adult' => 0,
    'romance' => 0,
    'science_fiction' => 0,
    'adventure' => 0,
    'drame' => 0,
    'biography' => 0,
    'magical_realism' => 0,
    'true_crime' => 0,
    'philosophy' => 0,
    'sports' => 0,
    'politics' => 0
];

// Modify each key with their number of occurences in the database
// Still need to rewrite this query to respect the status and the year indicated
foreach ($genres as $genre => $value) {
    $Number = $ReadActRepo->getGenres($username, $status, $time, $genre);
    $genres[$genre] = $Number->Total_sum;
}

// Get rid of null values
$genres = array_filter($genres, function ($value) {
    return $value != 0;
});

arsort($genres);

$jsonData = json_encode($genres);

echo $jsonData;
