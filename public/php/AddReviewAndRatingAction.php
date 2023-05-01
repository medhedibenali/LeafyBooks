<?php
session_start();

require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';
require_once MODULES_PATH . '/book_identification/Rating.php';

$isbn = $_POST['isbn'];
$review = $_POST['review'];
$rating = $_POST['rating'];
$username = $_SESSION['username'];

$userReviewsRepository = new UserReviewsRepository();
if (!($userReviewsRepository->find(['isbn' => $isbn, 'username' => $username]))) {
    $userReviewsRepository->insert(
        [
            'isbn' => $isbn,
            'username' => $username,
            'review' => $review,
            'rating' => $rating
        ]
    );
} else {
    $userReviewsRepository->update(
        ['isbn' => $isbn, 'username' => $username],
        ['review' => $review, 'rating' => $rating]
    );
}

updateRating($isbn);

header("Location: " . $_SERVER['HTTP_REFERER']);
