<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

/**
 * returns the percentage of ratings for every mark
 * @return array
 */

function getPercentages($isbn)
{
    $userReviewsRepository = new UserReviewsRepository();
    $total = count($userReviewsRepository->find(['isbn' => $isbn]));
    $percentages = array_fill(0, 6, 0);

    if ($total == 0) {
        return $percentages;
    }

    for ($i = 0; $i < 6; $i++) {
        $full = count($userReviewsRepository->find(['isbn' => $isbn, 'rating' => $i])); // integer ratings
        $half = count($userReviewsRepository->find(['isbn' => $isbn, 'rating' => $i + 0.5])); // integer and 1/2 ratings
        $fraction = ($full + $half) / $total;
        $percentage = $fraction * 100;
        $percentages[$i] = round($percentage, 1);
    }

    return $percentages;
}

/**
 * this function calculates the average rating of a book and updates the database
 * @param $isbn
 */

function updateRating($isbn)
{
    $sum = 0;
    $count = 0;
    $userReviewsRepository = new UserReviewsRepository();
    $bookRepository = new BookRepository();
    $reviews = $userReviewsRepository->find(['isbn' => $isbn]);

    foreach ($reviews as $review) {
        if ($review->rating === null) {
            continue;
        }

        $sum += $review->rating;
        $count++;
    }

    if ($count == 0) {
        return;
    }

    $rating = number_format($sum / $count, 1, '.', '');
    $bookRepository->update(['isbn' => $isbn], ['rating' => $rating]);
}

function getUserRating($isbn, $username)
{
    $userReviewsRepository = new UserReviewsRepository();
    $review = $userReviewsRepository->find(['isbn' => $isbn, 'username' => $username]);
    return $review->rating;
}
