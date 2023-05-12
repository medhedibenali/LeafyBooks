<?php
require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

$username = $_GET['username'] ?? '';

if ($username === '') {
    echo json_encode(true);
    die();
}

$userRepository = new UserRepository();
$user = $userRepository->find(['username' => $username]);

echo json_encode($user === false);