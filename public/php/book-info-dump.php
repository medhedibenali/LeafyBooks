<?php
/***
 * Contains all useful information about the book you're exploring
 */
require dirname(__FILE__,3).'/public/php/process-book-identity.php';
require_once dirname(__FILE__,3).'/public/book-identity.php';
//$ISBN=$_GET['ISBN'];
$book=findBook($ISBN);
$picture=$book->picture;
$title=$book->title;
$author=getAuthorPenName($ISBN);
$bio=getAuthorBio($ISBN);
$publisher=$book->publisher;
if(null!==getRating($ISBN))
{$rating=getRating($ISBN)[0];
 $NbRatings=getRating($ISBN)[1].' reviews';
}
else
{
    $rating=0;
    $NbRatings='no reviews yet';
}

$synopsis=$book->synopsis;