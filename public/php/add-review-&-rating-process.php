<?php

/*temporary until @mohamedHedi pushes the login page*/
include_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
include_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
include_once  dirname(__FILE__, 3) .'/modules/book_identification/UserReviewsRepository.php';
$ISBN=$_POST['ISBN'];
$review = $_POST['review'];
$rating = $_POST['rate'];
$username=$_POST['ConnectedUser']; //currently connected user
$BookRepo=new BookRepository();
$BookISBN=($BookRepo->find(["ISBN"=>$ISBN]))->ISBN;
$UserReviewsRepo=new UserReviewsRepository();




if(!($UserReviewsRepo->find(["ISBN"=>$ISBN,"username"=>$username])))
{
    $UserReviewsRepo->insert(["ISBN"=>$ISBN,"username"=>$username,"review"=>$review,"rating"=>$rating]);

}
else
{
    $UserReviewsRepo->update(["ISBN"=>$ISBN,"username"=>$username],["review"=>$review,"rating"=>$rating]);
}
header("Location: " . $_SERVER['HTTP_REFERER']);















