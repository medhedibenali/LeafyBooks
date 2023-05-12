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

$pageTitle = 'Sign up';

$stylesheets = array(
    'css/access.css'
);

require TEMPLATES_PATH . '/base-header.php';
?>

<div class="wrapper">
    <div class="container">
        <div>
            Sign Up
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


        <form action="php/SignUpAction.php" method="post" enctype="multipart/form-data">
            <label for="image">
                <div>
                    Profile Picture
                </div>
                <img src="" class="preview js-preview" alt="preview">
            </label>
            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp,image/gif">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" required>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" required>
            <label for="username">Username</label>
            <input type="text" class="js-username" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password" required>
            <label for="birthday">Birthday</label>
            <input type="date" name="birthday" id="birthday" required>
            <button type="submit" name="submit" value="submit">Sign up</button>
        </form>
    </div>
</div>

<?php

$scripts = array(
    'js/image-preview.js',
    'js/username-availability.js'
);

require TEMPLATES_PATH . '/base-footer.php';
