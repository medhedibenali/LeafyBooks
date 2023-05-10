<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$username = $_GET['username'];
$status = $_GET['status'];
$time = $_GET['time'];
$TagRepo = new TagRepository();
// Getting stat data for my first pie chart  
$moods = [
    'adventurous' => 0,
    'emotional' => 0,
    'mysterious' => 0,
    'lighthearted' => 0,
    'dark' => 0,
    'reflective' => 0,
    'funny' => 0,
    'tense' => 0,
    'informative' => 0,
    'challenging' => 0,
    'inspiring' => 0,
    'sad' => 0,
    'hopeful' => 0,
    'relaxing' => 0
];

$sum = 0;
// Modify each key with their number of occurences in the database
foreach ($moods as $mood => $value) {
    $Number = $TagRepo->TagNumber($username, $status, $time, $mood);
    $sum += $Number->Total;
    $moods[$mood] = $Number->Total;
}

// Get rid of null values
$moods = array_filter($moods, function ($value) {
    return $value != 0;
});

if (empty($moods) || !$sum) {
    foreach ($moods as $mood => $value) {
        $moods[$mood] = ($moods[$mood] / $sum) * 100;
        $moods[$mood] = number_format($moods[$mood], 2);
    }
}

$jsonData = json_encode($moods);

echo $jsonData;
