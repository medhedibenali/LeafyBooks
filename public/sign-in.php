<?php
session_start();

$_SESSION['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'] ?? '../index.php';

require_once dirname(__FILE__, 2) . '/config/config.php';

$pageTitle = 'Sign in';

$stylesheets = array(
    'css/access.css'
);

require TEMPLATES_PATH . '/base-header.php';
?>

<div class="wrapper">
    <div class="container">
        <div>
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
            <button type="submit">Sign in</button>
        </form>
    </div>
</div>

<?php

unset($_SESSION['attempted_username']);

require TEMPLATES_PATH . '/base-footer.php';
