<?php
require_once dirname(__FILE__, 3) . '/modules/book_identification/UserReviewsRepository.php';
require_once dirname(__FILE__, 3) . '/modules/book_identification/BookRepository.php';
require_once dirname(__FILE__, 3) . '/public/book-identity.php';


/***
 * returns the percentage of ratings for every mark
 * @return array
 */
function GetPercentage()
{  $UserReviewsRepository=new UserReviewsRepository();
    $ISBN=$_GET['ISBN'];
    $total=count($UserReviewsRepository->find(['ISBN'=>$ISBN]));
    $percentages=array();
    if ($total > 0) {

        for ($i = 0; $i < 6; $i++) {

            $var = '$per' . $i;
            $complete = count($UserReviewsRepository->find(["ISBN" => $ISBN, "rating" => $i])); // integer ratings
            $halves = count($UserReviewsRepository->find(["ISBN" => $ISBN, "rating" => $i+0.5]));// integer and 1/2 ratings
            $a=($complete+$halves)/ $total;
            $b = $a * 100;
            $percentages[$i] = round($b, 1);

        }
    }
    else
    {
        for ($i = 0; $i < 6; $i++)
        {

            $percentages[$i] = 0;
        }

    }

    return $percentages;
}





function getUserRating($username)
{
    $UserReviewsRepository=new UserReviewsRepository();
    $ISBN=$_GET['ISBN'];
    $user=$UserReviewsRepository->find(['ISBN'=>trim($ISBN),'username'=>trim($username)]);
    return $user->rating;

}

?>


