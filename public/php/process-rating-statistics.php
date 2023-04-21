<?php
require_once dirname(__FILE__, 3) . '/modules/book_identification/UserReviewsRepository.php';
require_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';


function GetPercentage()
{  $UserReviewsRepository=new UserReviewsRepository();
    $ISBN=$_GET['ISBN'];
    $total=count($UserReviewsRepository->find());
    $percentages=array();
    if ($total > 0) {

        for ($i = 0; $i < 6; $i++) {

            $var = '$per' . $i;
            $a = count($UserReviewsRepository->find(["ISBN" => $ISBN, "rating" => $i])) / $total;
            $b = $a * 100;
            $percentages[$i] = round($b, 1);

        }
    }
    else
    {
        for ($i = 1; $i < 6; $i++)
        {
            global $$var;
            $var = '$per' . $i;
            $percentages[$i] = 0;
        }

    }

    return $percentages;
}


function getAverageRating()
{   $BookRepository=new BookRepository();
    $ISBN=$_GET['ISBN'];
    $book=$BookRepository->find(['ISBN'=>$ISBN]);
    return $book->rating;


}


function getUserRating($username)
{
    $UserReviewsRepository=new UserReviewsRepository();
    $ISBN=$_GET['ISBN'];
    $user=$UserReviewsRepository->find(['ISBN'=>trim($ISBN),'username'=>trim($username)]);
    return $user->rating;

}

?>


