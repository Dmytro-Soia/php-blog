<?php
require_once "functions/auth.php";
require_once "functions/userPage.php";
logout();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://cdn.tiny.cloud/1/5t42bx25xwxji0szp3fnu02p1348n3alaqkr5hwzvyhut3od/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#text',
            plugins: 'codesample, anchor, emoticons',
        });
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>User Info Edition</title>
</head>

<body>
    <?php require "elements/navbar.php" ?>
    <?php require "elements/display_flash_messages.php" ?>
    <div>
        <form class="create-edit-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="newUserInfoId" value="<?= $userInfo["id"] ?>">
            <label class="label-create-edit" for="title">New Username</label>
            <input type="text" name="title" class="input-create-edit" value="<?= $chosenPost["title"] ?>" placeholder="Enter your new username">
            <label class="label-create-edit" for="content">New Bio</label>
            <textarea name="content" rows="10" id="text" class="textarea-create-edit" placeholder="Enter your new bio"><?= $chosenPost["content"] ?></textarea>
            <label class="label-create-edit" for="fileToUpload">Upload new profile photo</label>
            <input type="file" class="fileToUpload" name="fileToUpload">
            <button type="submit" class="button button-submit">Edit Info</button>
        </form>
    </div>
    <a href="postCreation.php">Post creation</a>
    <a href="postEdition.php">Post edition</a>
    <a href="login.php">Login page</a>
    <a href="register.php">Register page</a>
    <a href="postDetail.php">Post detail</a>
    <a href="index.php">Index</a>
</body>

</html>