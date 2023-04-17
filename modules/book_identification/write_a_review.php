<?php
//include_once  dirname(__FILE__, 3) .'/modules/isAuthentificated.php';
/*temporary until @mohamedHedi pushes the login page*/
$_SESSION['user']['username']='cha3cha3';
include_once  dirname(__FILE__, 3) .'/modules/book_identification/BookRepository.php';


include_once  dirname(__FILE__, 3) .'/modules/book_identification/BookRepository.php';
include_once  dirname(__FILE__, 3) .'/modules/book_identification/UserReviewsRepository.php';
$review = $_POST['review'];
$ISBN=$_POST['ISBN'];
$rating = $_POST['rate'];
$username=$_SESSION['user']['username']; //currently connected user
$BookRepo=new BookRepository();
$BookISBN=($BookRepo->find(["ISBN"=>$ISBN]))->ISBN;
$UserReviewsRepo=new UserReviewsRepository();


if(!($UserReviewsRepo->find(["ISBN"=>$ISBN,"username"=>$username])))
{
    $UserReviewsRepo->insert(["ISBN"=>$ISBN,"username"=>$username,"review"=>$review,"rating"=>$rating]);
    echo "review added successfully";
}
else
{
    echo "you already have posted a review";
}





