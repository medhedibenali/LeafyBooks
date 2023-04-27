<?php
require_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
require_once dirname(__FILE__, 3) . '/modules/book_identification/UserReviewsRepository.php';
require_once dirname(__FILE__, 3) . '/modules/auth/UserRepository.php';
require_once dirname(__FILE__, 3) . '/modules/auth/AuthorRepository.php';
/***
 * @param $ISBN
 * find a book by its ISBN
 * @return mixed
 */
function findBook($ISBN)
{   $bookRepo = new BookRepository();
    $book = $bookRepo->find(["ISBN" => $ISBN]);
    return $book;
}
/***
 * @param $ISBN
 * get all review rows for a specific book
 * @return mixed
 */
function getReviews($ISBN)
{   $userReviewRepo = new UserReviewsRepository();
    return ($userReviewRepo->find(["ISBN" => $ISBN]));
}
/***
 * @param $ISBN
 * this method calculates the average rating of a book and UPDATES it in the database
 * @return array:rating
 */
function getRating($ISBN)
{   $sum = 0;
    $nb = 0;
    $userReviewRepo = new UserReviewsRepository();
    $bookRepository = new BookRepository();
    $reviews = $userReviewRepo->find(["ISBN" => $ISBN]);
    foreach ($reviews as $review) {
        $sum += $review->rating;
        $nb++;
    }
    if (!$nb) {
        $rating = 0;
        return;
    }
    $rating = number_format($sum / $nb, 1, '.', '');
    $bookRepository->update(["ISBN" => $ISBN], ["rating" => $rating]);
    return ([$rating, $nb]);
}
/***
 * @param $username
 * function that returns the picrure of a given user's username
 * @return mixed
 */
function getUserPicture($username)
{   $userRepo = new UserRepository();
    $user = $userRepo->find(["username" => $username]);
    return ($user->picture);
}
/***
 * @param $ISBN
 * get the bio of a book's author
 * @return mixed
 */
function getAuthorBio($ISBN)
{   $bookRepository = new BookRepository();
    $authorRepository = new AuthorRepository();
    $book = $bookRepository->find(["ISBN" => $ISBN]);
    $author = $authorRepository->find(["id" => trim($book->author)]);
    return ($author->bio);
}
/***
 * @param $ISBN
 * get the pen name of a book's author
 * @return mixed
 */
function getAuthorPenName($ISBN)
{  $bookRepository = new BookRepository();
    $authorRepository = new AuthorRepository();
    $book = $bookRepository->find(["ISBN" => $ISBN]);
    $id = $book->author;
    $author = $authorRepository->find(["id" => trim($id)]);
    return ($author->pen_name);
}









