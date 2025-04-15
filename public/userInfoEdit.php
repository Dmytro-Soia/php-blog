<?php
require_once "functions/auth.php";
require_once "functions/userPage.php";
require_once "functions/userEdit.php";
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
            <input type="hidden" name="userInfoId" value="<?= $userInfo["id"] ?>">
            <label class="label-create-edit" for="title">New Username</label>
            <input type="text" name="username" class="input-create-edit" value="<?= $userInfo["username"] ?>" placeholder="Enter your new username">
            <label class="label-create-edit" for="content">New Bio</label>
            <textarea name="bio" rows="10" id="text" class="textarea-create-edit" placeholder="Enter your new bio"><?= $userInfo["bio"] ?></textarea>
            <label class="label-create-edit" for="fileToUpload">Upload new profile photo</label>
            <input type="file" class="fileToUpload" name="fileToUpload">
            <button type="submit" class="button button-submit">Edit Info</button>
        </form>
    </div>
</body>

</html>