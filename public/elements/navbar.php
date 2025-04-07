<?php

require_once "functions/auth.php";

connected();
$user = check_connection();
logout();
?>
<header class="header">
    <div class="header-left">
        <button class="button button-manage" onclick="window.location.href='index.php'">Home Page</button>
        <?php if ($user): ?>
            <button class="button button-manage" onclick="window.location.href='postCreation.php'">Create New Post</button>
        <?php endif; ?>
    </div>
    <?php if ($user): ?>
        <form method="post">
            <button type="submit" class="button button-logout" id="logout" name="logout" value="logout">Log Out</button>
        </form>
    <?php elseif ($user === null): ?>
        <div>
            <button class="button button-manage">Login</button>
            <button class="button button-manage">Register</button>
        </div>
    <?php endif; ?>
</header>