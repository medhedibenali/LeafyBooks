<?php

require_once dirname(__FILE__, 2) . '/config/config.php';

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
        <form action="php/SignUpAction.php" method="post">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" required>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" required>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password" required>
            <label for="birthday">Birthday</label>
            <input type="date" name="birthday" id="birthday" required>
            <button type="submit">Sign up</button>
        </form>
    </div>
</div>

<?php
require TEMPLATES_PATH . '/base-footer.php';
