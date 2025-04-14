<?php
require_once "../vendor/autoload.php";
require_once "functions/userPage.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Profile</title>
</head>

<body>
    <?php require "elements/navbar.php" ?>
    <div class="user-profile-grid">
        <div class="users-post">
            <?php foreach ($userPosts as $post): ?>
                <a href="postDetail.php?postID=<?= $post['id'] ?>" class="post-link">
                    <div class="post">
                        <h2 class="post-title"><?= $post["title"] ?></h2>
                        <img src="/images/<?= $post["photo"] ?>" class="post-photo" />
                        <div class="content">
                            <p class="content-text">
                                <?php
                                $config = HTMLPurifier_Config::createDefault();
                                $purifier = new HTMLPurifier($config);
                                echo $purifier->purify($post["content"]);
                                ?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="user-profile">
        <form class="user-form" action="userInfoEdit.php" method="post">
            <img src="images/def.png" id="user-profile-pic">
            <p>UID: <?= $userInfo["id"] ?></p>
            <label class="user-label" for="username">Username:</label>
            <h2 class="user-info" name="username"><?= $userInfo["username"] ?></h2>
            <label class="user-label" for="email">Email:</label>
            <h2 class="user-info" name="email"><?= $userInfo["email"] ?></h2>
            <label class="user-label" for="bio">Bio:</label>
            <textarea disabled class="user-textarea" rows="10" name="bio"><?= $userInfo["bio"] ?></textarea>
            <button class="button" type="submit">Change Information</button>
        </form>
    </div>
    </div>
</body>

</html>