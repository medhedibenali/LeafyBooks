<?php
session_start();

require_once dirname(__FILE__, 3) . '/modules/autoloader.php';

$isbn = $_POST['isbn'];
$review = $_POST['review'];

$username = $_SESSION['username'];

$userReviewsRepository = new UserReviewsRepository();

//first time the user submits a review for a book, insert it into the database, otherwise update it
if (!($userReviewsRepository->find(['isbn' => $isbn, 'username' => $username]))) {
    // This is the first time the user is submitting a review
    $userReviewsRepository->insert(['isbn' => $isbn, 'username' => $username, 'review' => $review]);
} else {
    // The user updated the review

    // the timezone is set tp africa tunis so it can show the time correctly when submit button is clicked
    date_default_timezone_set('Africa/Tunis');
    $timeSubmitted = date('Y-m-d H:i:s');

    $userReviewsRepository->update(
        ['isbn' => $isbn, 'username' => $username],
        ['review' => $review, 'time_submitted' => $timeSubmitted, 'is_updated' => true]
    );
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
