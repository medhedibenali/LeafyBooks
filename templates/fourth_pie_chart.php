<?php
include_once "../modules/autoloader.php";
// can include stats.php to achieve the desired query stated below
// for now i need username,status and time
$BookRepo = new BookRepository();
$username = $_GET['username'];
$status = $_GET['status'];
$time = $_GET['time'];
// Getting stat data for my first pie chart  
$fictions = [
    'fiction' => 0,
    'non_fiction' => 0
];

// Modify each key with their number of occurences in the database
// Still need to rewrite this query to respect the status and the year indicated

// All books will either have small,medium or large page count. Summing all possibilities gets us all of the books
$SmallNumber = $BookRepo->SmallPageCount($username, $status, $time);
$MediumNumber = $BookRepo->MediumPageCount($username, $status, $time);
$LargeNumber = $BookRepo->LargePageCount($username, $status, $time);

$BookNumber = $SmallNumber->Total + $MediumNumber->Total + $LargeNumber->Total;

$NonFictionBooks = $BookRepo->NonFictionCount($username, $status, $time);
$FictionBooks = $BookRepo->FictionCount($username, $status, $time);

if ($BookNumber) {
    $fictions['non_fiction'] = ($NonFictionBooks->Total / $BookNumber) * 100;
    $fictions['fiction'] = ($FictionBooks->Total / $BookNumber) * 100;
    $fictions['non_fiction'] = number_format($fictions['non_fiction'], 2);
    $fictions['fiction'] = number_format($fictions['fiction'], 2);
}

// Get rid of null values
$fictions = array_filter($fictions, function ($value) {
    return $value != 0;
});

$jsonData = json_encode($fictions);

echo $jsonData;
