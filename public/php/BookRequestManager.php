<?php
if(isset($_POST['btn-send']))
{
   $email= $_POST['email'];
   $author=$_POST['author'];
   $bookTitle=$_POST['bookTitle'];

    if(empty($author) || empty($email) || empty($bookTitle))
    {
        header('location:../request-book.php?error');
    }
    else
    {
        $to = "leafybookscontact@gmail.com";
        $subject="book request";
        $msg="Book: $bookTitle\n Author: $author ";
        /*
         for mail to work in a normal way, the project needs to be hosted on a server
        but ours is deployed locally so for this to work we need to follow the steps in this blog:
        https://www.codingnepalweb.com/configure-xampp-to-send-mail-from-localhost/
         */
        if(mail($to,$subject,$msg,"From: ".$email))
        {
            header("location:../request-book.php?success");
        }
    }
}
else
{
    header("location:../request-book.php");
}
