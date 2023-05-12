<?php
session_start();

require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($username === null || $password === null || !isset($_POST['submit'])) {
    header('Location: ../sign-in.php');
    die();
}

unset($_POST['submit']);

$userRepository = new UserRepository();
$user = $userRepository->find(['username' => $username]);

if ($user === false) {
    $_SESSION['error'] = 'The username you entered isn\'t connected to an account.';
    header('Location: ../sign-in.php');
    die();
}

if (password_verify($password, $user->password)) {
    $_SESSION['username'] = $username;

    $httpReferer = $_SESSION['HTTP_REFERER'] ?? '../index.php';
    unset($_SESSION['HTTP_REFERER']);

    header('Location: ' . $httpReferer);
    die();
}

$_SESSION['error'] = 'The password you\'ve entered is incorrect.';
$_SESSION['attempted_username'] = $username;

header('Location: ../sign-in.php');
