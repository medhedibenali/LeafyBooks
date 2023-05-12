<?php
session_start();

require_once dirname(__FILE__, 2) . '/config/config.php';

$pageTitle = 'Sign up';

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
                <div class="image-container">
                    <img src="img/add-image.svg" class="image-preview js-preview" alt="image-preview">
                </div>
            </label>
            <input type="file" name="image" id="image" accept="image/jpeg,image/png,image/webp,image/gif">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" pattern="([a-zA-Z]+ *)*[a-zA-Z]+" autofocus required>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" pattern="([a-zA-Z]+ *)*[a-zA-Z]+" required>
            <label for="username">Username</label>
            <input type="text" class="username js-username" name="username" id="username" pattern="\S{6,30}" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password" pattern="\S{8,}" required>
            <label for="birthday">Birthday</label>
            <input type="date" name="birthday" id="birthday" required>
            <button type="submit" name="submit" value="submit">Sign up</button>
        </form>
        <div class="redirect">
            Already have an account? <a href="sign-in.php">Sign in</a>.
        </div>
    </div>
</div>

<?php

$scripts = array(
    'js/image-preview.js',
    'js/username-availability.js'
);

require TEMPLATES_PATH . '/base-footer.php';