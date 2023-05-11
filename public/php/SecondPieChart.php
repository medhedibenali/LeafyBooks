<?php
require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

// can include stats.php to achieve the desired query stated below
// for now i need username,status and time
$TagRepo = new TagRepository();
$username = $_GET['username'];
$status = $_GET['status'];
$time = $_GET['time'];
// Getting stat data for my first pie chart  
$paces = [
    'slow_paced' => 0,
    'medium_paced' => 0,
    'fast_paced' => 0
];

$sum = 0;
// Modify each key with their number of occurences in the database
// Still need to rewrite this query to respect the status and the year indicated
foreach ($paces as $pace => $value) {
    $Number = $TagRepo->TagNumber($username, $status, $time, $pace);
    $sum += $Number->Total;
    $paces[$pace] = $Number->Total;
}

// Get rid of null values
$paces = array_filter($paces, function ($value) {
    return $value != 0;
});

if (empty($paces) || !$sum) {
    foreach ($paces as $pace => $value) {
        $paces[$pace] = ($paces[$pace] / $sum) * 100;
        $paces[$pace] = number_format($paces[$pace], 2);
    }
}

$jsonData = json_encode($paces);

echo $jsonData;
