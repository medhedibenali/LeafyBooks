<?php
session_start();

require_once dirname(__FILE__, 3) . '/modules/autoloader.php';

$isbn = $_POST['isbn'];
$review = $_POST['review'];
$rating = $_POST['rate'];
$username = $_SESSION['username'];
$bookRepo = new BookRepository();
$userReviewsRepo = new UserReviewsRepository();
if (!($userReviewsRepo->find(["isbn" => $isbn, "username" => $username]))) {
    $userReviewsRepo->insert(["isbn" => $isbn, "username" => $username, "review" => $review, "rating" => $rating]);
} else {
    $userReviewsRepo->update(["isbn" => $isbn, "username" => $username], ["review" => $review, "rating" => $rating]);
}
header("Location: " . $_SERVER['HTTP_REFERER']);
