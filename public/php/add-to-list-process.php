<?php
session_start();
include_once dirname(__FILE__, 3) . '/modules/book-activity/CurrentReadRepository.php';
include_once dirname(__FILE__, 3) . '/modules/book-activity/FinishReadRepository.php';
include_once dirname(__FILE__, 3) . '/modules/book-activity/ToReadRepository.php';
$_SESSION['user']['username']="amal";/*temporary*/
$username=$_SESSION['user']['username'];
$state=$_POST['answer'];
$ISBN=$_POST['ISBN'];



$path=dirname(__FILE__, 3) . '/public/book-identity';

echo "$answer";
//header("Location: " . $_SERVER['HTTP_REFERER']);

