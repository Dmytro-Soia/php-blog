<?php
require "functions/auth.php";
forced_connection();
require "functions/logout.php";
require "functions/postInDetail.php";
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
<?php require "elements/navbar.php"?>
    <img src="./images/<?= $chosenPost["photo"]?>" class="photo-in-detail" alt="Post Image" />

    <div class="post-in-detail">
        <h1 class="title-in-detail"><?= $chosenPost["title"]?></h1>
        <p class="content-text-in-detail">
            <?= $chosenPost["content"] ?>
        </p>
    </div>
    <div class="redirect-to-edit">
     <form action="postEdition.php" method="GET">
        <input type="hidden" name="postId" value="<?= $chosenPost["id"]?>">
        <button type="submit" class="button button-submit">Edit</button>
    </div>
    <a href="postCreation.php">Post Creation</a>
    <a href="postEdition.php">Post Edition</a>
    <a href="login.php">Login Page</a>
    <a href="register.php">Register Page</a>
    <a href="postDetail.php">Post Detail</a>
    <a href="index.php">Index</a>
</body>

</html>