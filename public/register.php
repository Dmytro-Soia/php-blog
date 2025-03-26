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

    <header class="header">
        <div class="header-left">
            <button class="button button-manage" onclick="window.location.href='index.php'">Home Page</button>
            <button class="button button-manage" onclick="window.location.href='postCreation.php'">Create New Post</button>
        </div>
        <button class="button button-logout" id="logout">Log Out</button>
    </header>


    <div class="login-register-container">
        <h1>Register New Account</h1>
        <form action="" method="post">
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
    <a href="postCreation.php">Post Creation</a>
    <a href="postEdition.php">Post Edition</a>
    <a href="login.php">Login Page</a>
    <a href="register.php">Register Page</a>
    <a href="postDetail.php">Post Detail</a>
    <a href="index.php">Index</a>
</body>

</html>