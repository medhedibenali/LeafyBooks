<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/access.css">
    <title>Sign in</title>
</head>

<body>
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

            <form action="php/SignInManager.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $_SESSION['attempted_username'] ?? '' ?>" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="new-password" required>
                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
unset($_SESSION['attempted_username']);
?>