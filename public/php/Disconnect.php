<?php
session_start();

unset($_SESSION['username']);

$httpReferer =  $_SERVER['HTTP_REFERER'] ?? '../index.php';
header('Location: ' . $httpReferer);
