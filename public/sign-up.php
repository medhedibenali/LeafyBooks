<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sign-up.css">
    <title>Sign up</title>
</head>

<body>
    <div class="container">
        <form class="form" action="php/SignUpManager.php" method="post">
            <div>
                Sign Up
            </div>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" required>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" required>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" autocomplete="new-password" required>
            <label for="birthday">Birthday</label>
            <input type="date" name="birthday" id="birthday" required>
            <div class="buttons">
                <button type="submit">Sign Up</button>
                <button type="reset">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>