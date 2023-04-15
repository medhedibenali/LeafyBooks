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
            <form action="php/SignInManager.php" method="post">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="new-password" required>
                <div class="buttons">
                    <button type="submit">Sign Up</button>
                    <button type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>