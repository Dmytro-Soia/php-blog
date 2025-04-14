<?php
require_once "functions/auth.php";
connected();
login();
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
    <?php require "elements/navbar.php"?>
    <div class="login-register-container">
    <?php require "elements/display_flash_messages.php" ?>
        <h1>Login to account</h1>
        <form action="login.php" method="post">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" />
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Enter your password" />
            <button type="submit" class="login-register-submit-button">Login</button>
        </form>
        <p class="login-register-text">Don't have an account? <a class="login-register-link" href="register.php">Register now!</a></p>
    </div>
</body>

</html>