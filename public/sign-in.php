<?php
session_start();

require_once dirname(__FILE__, 2) . '/config/config.php';

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

$pageTitle = 'Sign in';

$stylesheets = array(
    'css/access.css'
);

require TEMPLATES_PATH . '/base-header.php';
?>

<div class="wrapper">
    <div class="container">
        <div class="title">
            Sign In
        </div>

        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <div class="error">
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            unset($_SESSION['error']);
        }
        ?>

        <form action="php/SignInAction.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= $_SESSION['attempted_username'] ?? '' ?>" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password" required>
            <button type="submit" name="submit" value="submit">Sign in</button>
        </form>
    </div>
</div>

<?php

unset($_SESSION['attempted_username']);

require TEMPLATES_PATH . '/base-footer.php';