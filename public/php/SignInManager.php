<?php
session_start();

require_once dirname(__FILE__, 3) . '/modules/autoloader.php';

$userRepository = new UserRepository();
$user = $userRepository->find(['username' => $_POST['username']]);


if ($user == false) {
    $_SESSION['error'] = 'The username you entered isn\'t connected to an account.';
    header('Location:  ../sign-in.php');
    die();
}

if (password_verify($_POST['password'], $user->password)) {
    $_SESSION['username'] = $user->username;
    header('Location:  ../index.php');
    die();
} else {
    $_SESSION['error'] = 'The password you\'ve entered is incorrect.';
    $_SESSION['attempted_username'] = $user->username;
    header('Location:  ../sign-in.php');
    die();
}
