<?php
require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

// can include stats.php to achieve the desired query stated below
// for now i need username,status and time
$BookRepo = new BookRepository();
$username = $_GET['username'];
$status = $_GET['status'];
$time = $_GET['time'];
// Getting stat data for my first pie chart  
$pages = [
    '<300' => 0,
    '300-499' => 0,
    '500+' => 0
];

$sum = 0;
// Modify each key with their number of occurences in the database
// Still need to rewrite this query to respect the status and the year indicated
foreach ($pages as $page => $value) {
    if ($page == '<300') {
        $Number = $BookRepo->SmallPageCount($username, $status, $time);
    } else if ($page == '300-499') {
        $Number = $BookRepo->MediumPageCount($username, $status, $time);
    } else {
        $Number = $BookRepo->LargePageCount($username, $status, $time);
    }
    $sum += $Number->Total;
    $pages[$page] = $Number->Total;
}

// Get rid of null values
$pages = array_filter($pages, function ($value) {
    return $value != 0;
});

if (empty($pages) || !$sum) {
    foreach ($pages as $page => $value) {
        $pages[$page] = ($pages[$page] / $sum) * 100;
        $pages[$page] = number_format($pages[$page], 2);
    }
}

$jsonData = json_encode($pages);

echo $jsonData;
