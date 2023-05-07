<?php
session_start();

require_once dirname(__FILE__, 3) . '/modules/autoloader.php';
$isbn = $_POST['isbn'];
$review = $_POST['review'];
$time_submitted = $_POST['time_submitted'];
$username = $_SESSION['username'];
$bookRepo = new BookRepository();
$userReviewsRepo = new UserReviewsRepository();
//first time the user submits a review for a book, insert it into the database, otherwise update it
if (!($userReviewsRepo->find(["isbn" => $isbn, "username" => $username]))) {
    $userReviewsRepo->insert(["isbn" => $isbn, "username" => $username, "review" => $review, "time_submitted" => $time_submitted,"isUpdated"=>false]);
    // This is the first time the user is submitting a review
} else {
    $userReviewsRepo->update(["isbn" => $isbn, "username" => $username], ["review" => $review,"time_submitted" => $time_submitted,"isUpdated"=>true]);
    // The user updated the review
}
header("Location: " . $_SERVER['HTTP_REFERER']);
