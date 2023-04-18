<?php
require_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
require_once dirname(__FILE__, 3) .'/modules/book_identification/UserReviewsRepository.php';
require_once dirname(__FILE__, 3) . '/modules/auth/UserRepository.php';

function findBook($ISBN)
{
    $bookRepo = new BookRepository();
    $book = $bookRepo->find(["ISBN" => $ISBN]); //find book with $ISBN id*
    return $book;
}


function getReviews($ISBN)
{
    $UserReviewRepo=new UserReviewsRepository();
    return ($UserReviewRepo->find(["ISBN"=>$ISBN]));

}



function getRating($ISBN)
{

    $sum=0;
    $nb=0;
    $UserReviewRepo=new UserReviewsRepository();
    $BookRepository=new BookRepository();
    $books=$UserReviewRepo->find(["ISBN"=>$ISBN]);
   foreach ($books as $book)
   {
       $sum+=$book->rating;
       $nb++;
   }

   $rating= number_format($sum/$nb, 1, '.', '');

   $BookRepository->update(["ISBN"=>$ISBN],["rating"=>$rating]);
   return([$rating,$nb]);

}



function getUserPicture($username)
{
    $UserRepo=new UserRepository();
    $user=$UserRepo->find(["username"=>$username]);
    return($user->picture);
}













