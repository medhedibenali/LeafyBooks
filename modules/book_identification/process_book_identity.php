<?php
require_once dirname(__FILE__, 3) .'/modules/book_identification/BookRepository.php';
require_once dirname(__FILE__, 3) .'/modules/book_identification/UserReviewsRepository.php';
require_once dirname(__FILE__, 3) .'/modules/auth/UserRepository.php';



function findBook($ISBN)
{
    $bookRepo = new BookRepository();
    $book = $bookRepo->findOne(["ISBN" => $ISBN]); //find book with $ISBN id*
    return $book;
}


function getReviews($ISBN)
{
    $UserReviewRepo=new UserReviewsRepository();
    return $UserReviewRepo->findALL(["ISBN"=>$ISBN]);

}

function getUserPicture($username)
{
    $UserRepo=new UserRepository();
    $user=$UserRepo->find(["username"=>$username]);
    return($user->picture);
}













