<?php
session_start();

require_once dirname(__FILE__, 2) . '/config/config.php';

$pageTitle = 'Sign in';

require TEMPLATES_PATH . '/access-header.php';
?>

<div class="wrapper">
    <div class="logo-container">
        <a href="index.php" class="logo">
            <i class="fa-solid fa-leaf"></i> LeafyBooks
        </a>
    </div>
    <div class="form-container">
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
            <input type="text" name="username" id="username" value="<?= $_SESSION['attempted_username'] ?? '' ?>" pattern="\S{6,30}" autofocus required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password" pattern="\S{8,}" required>
            <button type="submit" name="submit" value="submit">Sign in</button>
        </form>
        <div class="redirect">
            New to LeafyBooks? <a href="sign-up.php">Create an account</a>.
        </div>
    </div>
</div>

<?php

unset($_SESSION['attempted_username']);

require TEMPLATES_PATH . '/base-footer.php';