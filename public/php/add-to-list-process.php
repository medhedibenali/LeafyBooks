<?php
session_start();
include_once dirname(__FILE__, 3) . '/modules/book-activity/ReadActRepository.php';

$ReadActRepository=new ReadActRepository();
$_SESSION['user']['username']='amal';/*temporary*/
$username=$_SESSION['user']['username'];
$state=$_POST['answer'];
$ISBN=$_POST['ISBN'];
$StartingDate=0;
$FinishDate=0;

if($state=="finishedreading")
{
    $FinishDate=date('Y-m-d');
}
if($state=="currentlyreading")
{
    $StartingDate=date('Y-m-d');
}



$path=dirname(__FILE__, 3) . '/public/book-identity';

if(!$ReadActRepository->find(["ISBN"=>$ISBN,"username"=>$username]))
{
    $ReadActRepository->insert(["ISBN"=>$ISBN,"username"=>$username,"status"=>$state,"start_date"=>$StartingDate,"finish_date"=>$FinishDate]);
}

else
{
    $ReadActRepository->update(["ISBN"=>$ISBN, "username"=>$username],["status"=>$state,"start_date"=>$StartingDate,"finish_date"=>$FinishDate]);
    echo "updated successfully";
}

//$path= dirname(__FILE__, 3).'/public/book-identity.php';
//echo $path;

