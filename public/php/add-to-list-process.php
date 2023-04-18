<?php
session_start();
include_once dirname(__FILE__, 3) . '/modules/book-activity/ReadActRepository.php';

$ReadActRepository=new ReadActRepository();
$_SESSION['user']['username']='amal';/*temporary*/
$username=$_SESSION['user']['username'];
$state=$_POST['answer'];
$ISBN=$_POST['ISBN'];



$path=dirname(__FILE__, 3) . '/public/book-identity';

if(!$ReadActRepository->find(["ISBN"=>$ISBN,"username"=>$username]))
{
    $StartingDate=date('Y-m-d');
    $FinishDate=date('Y-m-d');
    $ReadActRepository->insert(["ISBN"=>$ISBN,"username"=>$username,"status"=>$state,"start_date"=>$StartingDate,"finish_date"=>$FinishDate]);
    header('location:');
}

else
{
    if($state=='finishedreading')
    {
        $FinishDate=date('Y-m-d');
        $ReadActRepository->update(["ISBN"=>$ISBN, "username"=>$username],["status"=>$state,"finish_date"=>$FinishDate]);

    }

    else if ($state=="currentlyreading")
    {
        $FinishDate=0;
        $StartingDate=date('Y-m-d');
        $ReadActRepository->update(["ISBN"=>$ISBN, "username"=>$username],["status"=>$state,"start_date"=>$StartingDate,"finish_date"=>$FinishDate]);

    }
    else
    {   $FinishDate=0;
        $StartingDate=0;
        $ReadActRepository->update(["ISBN"=>$ISBN, "username"=>$username],["status"=>$state,"start_date"=>$StartingDate,"finish_date"=>$FinishDate]);

    }

}
$last_page = $_SERVER['HTTP_REFERER'];
header("Location: $last_page");





