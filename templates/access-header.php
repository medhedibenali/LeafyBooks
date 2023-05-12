<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once dirname(__FILE__, 2) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}

// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

$urls[] = $url . '/sign-in.php';
$urls[] = $url . '/sign-up.php';

$httpReferer = $_SERVER['HTTP_REFERER'] ?? '../index.php';

if (in_array($httpReferer, $urls)) {
    $_SESSION['HTTP_REFERER'] = $_SESSION['HTTP_REFERER'] ?? '../index.php';
} else {
    $_SESSION['HTTP_REFERER'] = $httpReferer;
}

if (isset($_SESSION['username'])) {
    $userRepository = new UserRepository();
    $user = $userRepository->find(['username' => $_SESSION['username']]);
    if ($user !== false) {
        header('Location: ' . $httpReferer);
        die();
    }
    unset($_SESSION['username']);
}

$stylesheets = array(
    array(
        'href' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        'integrity' => 'sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer'
    ),
    'css/access.css'
);

require TEMPLATES_PATH . '/base-header.php';
