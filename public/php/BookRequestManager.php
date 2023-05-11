<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_POST['btn-send'])) {
    header('Location: ../request-book.php');
    die();
}

$email = $_POST['email'];
$author = $_POST['author'];
$bookTitle = $_POST['bookTitle'];

if (empty($author) || empty($email) || empty($bookTitle)) {
    $_SESSION['request-error'] = true;
    header('Location: ../request-book.php');
    die();
}

$to = "leafybookscontact@gmail.com";
$subject = "book request";
$msg = "Book: $bookTitle\n Author: $author ";

/**
 * for mail to work in a normal way, the project needs to be hosted on a server
 * but ours is deployed locally so for this to work we need to follow the steps in this blog if we're using XAMPP:
 * https://www.codingnepalweb.com/configure-xampp-to-send-mail-from-localhost/
 */

if (mail($to, $subject, $msg, "From: " . $email)) {
    $_SESSION['request-success'] = true;
    header('Location: ../request-book.php');
    die();
}
