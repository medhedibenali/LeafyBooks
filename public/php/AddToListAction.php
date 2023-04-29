<?php
session_start();

require_once dirname(__FILE__, 3) . '/modules/autoloader.php';

$readActRepository = new ReadActRepository();
$username = $_SESSION['username'];
$state = $_POST['answer'];
$isbn = $_POST['isbn'];

$path = dirname(__FILE__, 3) . '/public/book-identity';

if (!$readActRepository->find(["isbn" => $isbn, "username" => $username])) {
    $startingDate = date('Y-m-d');
    $finishDate = date('Y-m-d');
    $readActRepository->insert(["isbn" => $isbn, "username" => $username, "status" => $state, "start_date" => $startingDate, "finish_date" => $finishDate]);
} else {
    if ($state == 'finished_reading') {
        $finishDate = date('Y-m-d');
        $readActRepository->update(["isbn" => $isbn, "username" => $username], ["status" => $state, "finish_date" => $finishDate]);
    } else if ($state == "currently_reading") {
        $finishDate = 0;
        $startingDate = date('Y-m-d');
        $readActRepository->update(["isbn" => $isbn, "username" => $username], ["status" => $state, "start_date" => $startingDate, "finish_date" => $finishDate]);
    } else {
        $finishDate = 0;
        $startingDate = 0;
        $readActRepository->update(["isbn" => $isbn, "username" => $username], ["status" => $state, "start_date" => $startingDate, "finish_date" => $finishDate]);
    }
}
$last_page = $_SERVER['HTTP_REFERER'];
header("Location: $last_page");
