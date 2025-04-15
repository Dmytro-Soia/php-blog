<?php
require_once "../vendor/autoload.php";
require_once "functions/auth.php";
connected();
$user = check_connection();
require_once "functions/postInDetail.php";
require_once "functions/purifier.php";
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
    <title>Post Detail</title>
</head>

<body>
    <?php require "elements/navbar.php" ?>
    <img src="./images/<?= $chosenPost["photo"] ?>" class="photo-in-detail" alt="Post Image" />

    <div class="post-in-detail">
        <?php require "elements/display_flash_messages.php" ?>
        <h1 class="title-in-detail"><?= purify($chosenPost["title"]) ?></h1>
        <p class="content-text-in-detail"><?= purify($chosenPost["content"]) ?></p>
    </div>
    <div class="redirect-to-edit">
        <form action="postEdition.php" method="GET">
            <input type="hidden" name="postId" value="<?= $chosenPost["id"] ?>">
            <?php if ($user): ?>
                <button type="submit" class="button button-submit">Edit</button>
            <?php endif; ?>
    </div>
</body>

</html>