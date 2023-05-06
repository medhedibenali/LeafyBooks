<?php
require_once dirname(__FILE__, 2) . '/autoloader.php';

/***
 * @param $isbn
 * find a book by its isbn
 * @return mixed
 */
function findBook($isbn)
{
    $bookRepo = new BookRepository();
    $book = $bookRepo->find(["isbn" => $isbn]);
    return $book;
}

/***
 * @param $isbn
 * get all review rows for a specific book
 * @return mixed
 */
function getReviews($isbn)
{
    $userReviewRepo = new UserReviewsRepository();
    return ($userReviewRepo->find(["isbn" => $isbn]));
}

/***
 * @param $isbn
 * this method calculates the average rating of a book and UPDATES it in the database
 * @return array:rating
 */
function getRating($isbn)
{
    $sum = 0;
    $nb = 0;
    $userReviewRepo = new UserReviewsRepository();
    $bookRepository = new BookRepository();
    $reviews = $userReviewRepo->find(["isbn" => $isbn]);
    foreach ($reviews as $review) {
        $sum += $review->rating;
        $nb++;
    }
    if (!$nb) {
        $rating = 0;
        return;
    }
    $rating = number_format($sum / $nb, 1, '.', '');
    $bookRepository->update(["isbn" => $isbn], ["rating" => $rating]);
    return ([$rating, $nb]);
}

/***
 * @param $username
 * function that returns the picrure of a given user's username
 * @return mixed
 */
function getUserPicture($username)
{
    $userRepo = new UserRepository();
    $user = $userRepo->find(["username" => $username]);
    return ($user->picture);
}

/***
 * @param $isbn
 * get the bio of a book's author
 * @return mixed
 */
function getAuthorBio($isbn)
{
    $bookRepository = new BookRepository();
    $authorRepository = new AuthorRepository();
    $book = $bookRepository->find(["isbn" => $isbn]);
    $author = $authorRepository->find(["id" => trim($book->author)]);
    return ($author->bio);
}
