<?php
session_start();

require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';
require_once MODULES_PATH . '/book_identification/Rating.php';

$isbn = $_POST['isbn'];
$rating = $_POST['rate'];

$username = $_SESSION['username'];

$userReviewsRepository = new UserReviewsRepository();

if (!($userReviewsRepository->find(["isbn" => $isbn, "username" => $username]))) {
    $userReviewsRepository->insert(["isbn" => $isbn, "username" => $username, "rating" => $rating]);
} else {
    date_default_timezone_set('Africa/Tunis');
    $timeSubmitted = date('Y-m-d H:i:s');

    $userReviewsRepository->update(
        ["isbn" => $isbn, "username" => $username],
        ["rating" => $rating, 'time_submitted' => $timeSubmitted, 'is_updated' => true]
    );
}

updateRating($isbn);

header("Location: " . $_SERVER['HTTP_REFERER']);
