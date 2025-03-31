<?php
require "functions/login_into_account.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <title>Login</title>
</head>

<body>
    <div class="login-register-container">
        <h1>Login to account</h1>
        <?php if (count($errors) > 0): ?>
            <?php foreach ($errors as $error): ?>
                <p class="error"><?= $error ?></p>
            <?php endforeach; ?>
    <?php endif; ?>
        <form action="login.php" method="post">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" />
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Enter your password" />
            <button type="submit" class="login-register-submit-button">Login</button>
        </form>
        <p class="login-register-text">Don't have an account? <a class="login-register-link" href="register.php">Register now!</a></p>
    </div>
    <a href="postCreation.php">Post Creation</a>
    <a href="postEdition.php">Post Edition</a>
    <a href="login.php">Login Page</a>
    <a href="register.php">Register Page</a>
    <a href="postDetail.php">Post Detail</a>
    <a href="index.php">Index</a>
</body>

</html>