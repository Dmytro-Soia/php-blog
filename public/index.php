<?php
require_once "../vendor/autoload.php";

require_once "functions/auth.php";
connected();
logout();
require_once "functions/displayPosts.php";
require_once "functions/flashMessages.php";
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
    <title>Home page</title>
</head>

<body>
    <?php require "elements/navbar.php" ?>
    <?php require "elements/display_flash_messages.php" ?>
    <div class="grid-section">
        <?php foreach ($allPosts as $post): ?>
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
</body>

</html>