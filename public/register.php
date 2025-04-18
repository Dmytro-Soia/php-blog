<?php
require_once "functions/auth.php";
connected();
require_once "functions/registration.php";
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
    <title>Register</title>
</head>

<body>
    <div class="login-register-container">
        <?php require "elements/display_flash_messages.php" ?>
        <h1>Register New Account</h1>
        <form action="register.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter your username">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" />
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Enter your password" />
            <button type="submit" class="login-register-submit-button">Register</button>
        </form>
        <p class="login-register-text">Already have an account? <a class="login-register-link" href="login.php">Login now!</a></p>
    </div>
</body>

</html>