<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:../public/book-lists.php');
}
