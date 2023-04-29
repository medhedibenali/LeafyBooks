<?php

/***
 * Contains all useful information about the book you're exploring
 */

require_once dirname(__FILE__, 3) . '/modules/autoloader.php';

$book = findBook($isbn);
$authorRepo = new AuthorRepository();
$picture = $book->picture;
$title = $book->title;
$author = ($authorRepo->find(['id' => trim($book->author)]))->pen_name;
$bio = getAuthorBio($isbn);
$publisher = $book->publisher;
if (getRating($isbn) !== null) {
    $rating = getRating($isbn)[0];
    $nbRatings = getRating($isbn)[1] . ' reviews';
} else {
    $rating = 0;
    $nbRatings = 'no reviews yet';
}
$synopsis = $book->synopsis;
