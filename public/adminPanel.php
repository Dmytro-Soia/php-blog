<?php
require_once "../vendor/autoload.php";

require_once "functions/auth.php";
$admin = $_SESSION["isAdmin?"];
var_dump($_SESSION);
admin_page_protection($admin);
require_once "functions/adminChanging.php";
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
    <title>Admin Changing</title>
</head>

<body>
    <?php require "elements/navbar.php" ?>
    <?php require "elements/display_flash_messages.php" ?>
    <div class="users-grid-section">
        <?php foreach ($allUsers as $user): ?>
            <form method="post">
            <div class="display-users">
                <input type="hidden" value=<?= $user["id"] ?> name="adminChanges">
                <p>ID: <?= $user["id"] ?></p>
                <p> Username: <?php
                                $config = HTMLPurifier_Config::createDefault();
            $purifier = new HTMLPurifier($config);
            echo $purifier->purify($user["username"]);
            ?>
                </p>
                <p>Email: <?= $user["email"] ?></p>
                <div>
                    <label for="Admin">Administrator: </label>
                    <input type="checkbox" name="admin" value="admin" <?= $user["administrator"] === 1 ? 'checked' : '' ?>><br><br>
                </div>
            </div>
            <button type="submit" class="button admin-button">Confirm changes</button>
            </form>
        <?php endforeach; ?>
    </div>
    <a href="postCreation.php">Post creation</a>
    <a href="postEdition.php">Post edition</a>
    <a href="login.php">Login page</a>
    <a href="register.php">Register page</a>
    <a href="postDetail.php">Post detail</a>
    <a href="index.php">Index</a>
</body>

</html>