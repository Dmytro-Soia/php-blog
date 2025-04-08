<?php

require_once "functions/auth.php";

connected();
$user = check_connection();
logout();
?>
<header class="header">
    <div class="header-left">
        <a class="button button-manage home-page" href='index.php'>Home Page</a>
        <?php if ($user): ?>
            <a class="button button-manage post-creation" href='postCreation.php'>Create New Post</a>
        <?php endif; ?>
    </div>
    <?php if ($user): ?>
        <form method="post">
            <button type="submit" class="button button-logout" id="logout" name="logout" value="logout">Log Out</button>
        </form>
    <?php elseif ($user === null): ?>
        <div class="header-right">
            <a class="button button-manage login" href="login.php">Login</a>
            <a class="button button-manage register" href="register.php">Register</a>
        </div>
    <?php endif; ?>
</header>