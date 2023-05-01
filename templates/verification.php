<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['error']='Please login to access My Books';
    header("Location:sign-in.php ");
}