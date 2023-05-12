<?php
session_start();

require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';
require_once MODULES_PATH . '/image/ImageHandler.php';

if (!isset($_POST['submit'])) {
    header('Location: ../sign-up.php');
    die();
}

unset($_POST['submit']);

$patterns = [
    'username' => '/^\S{6,30}$/',
    'password' => '/^\S{8,}$/',
    'first_name' => '/^([a-z]+ *)*[a-z]+$/i',
    'last_name' => '/^([a-z]+ *)*[a-z]+$/i'
];


foreach ($patterns as $key => $pattern) {
    if (!preg_match($pattern, $_POST[$key] ?? '')) {
        $field = preg_replace('/_/', ' ', $key);
        $_SESSION['error'] = "The $field field is invalid.";
        header('Location: ../sign-up.php');
        die();
    }
}

$dateLimit = strtotime('-13 years');
$birthday = strtotime($_POST['birthday'] ?? 'now');

if ($birthday > $dateLimit) {
    $_SESSION['error'] = "The birthday field is invalid.";
    header('Location: ../sign-up.php');
    die();
}

$userRepository = new UserRepository();
$user = $userRepository->find(['username' => $_POST['username']]);

if ($user !== false) {
    $_SESSION['error'] = "This username already exists.";
    header('Location: ../sign-up.php');
    die();
}

$imageInfo = saveImage(
    $_FILES['image'] ?? null,
    '../img/users'
);

if ($imageInfo === false) {
    header('Location: ../sign-up.php');
    die();
}

$formInput = array_merge($_POST, $imageInfo);

$userRepository->insert($formInput);

$_SESSION['username'] = $formInput['username'];

$httpReferer = $_SESSION['HTTP_REFERER'] ?? '../index.php';
unset($_SESSION['HTTP_REFERER']);

header('Location: ' . $httpReferer);
