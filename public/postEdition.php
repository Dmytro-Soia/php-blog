<?php
require_once "functions/auth.php";
connected();
$user = check_connection();
$author = creator_id();
$admin = $_SESSION["isAdmin?"];
forced_connection($user);
forced_connection_and_same_user($author, $user, $admin);
logout();
require_once "functions/editPost.php";
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
    <title>Post Edition</title>
</head>

<body>
    <?php require "elements/navbar.php" ?>
    <?php require "elements/display_flash_messages.php" ?>
    <div>
        <form class="create-edit-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="newPostId" value="<?= $chosenPost["id"] ?>">
            <label class="label-create-edit" for="title">New Post Title</label>
            <input type="text" name="title" class="input-create-edit" value="<?= $chosenPost["title"] ?>" placeholder="Enter the new title of your post">
            <label class="label-create-edit" for="content">New Post Content</label>
            <textarea name="content" rows="10" id="text" class="textarea-create-edit" placeholder="Enter the new content of your post"><?= $chosenPost["content"] ?></textarea>
            <label class="label-create-edit" for="fileToUpload">Upload new photo</label>
            <input type="file" class="fileToUpload" name="fileToUpload">
            <button type="submit" class="button button-submit">Edit Post</button>
        </form>
    </div>
</body>

</html>