<?php
$errors = [];
require_once "functions/auth.php";
connected();
$user = check_connection();
forced_connection($user);
logout();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "functions/savePhotoToFolder.php";
    require_once "functions/createNewPost.php";
}
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
        selector: '#textarea',
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
        <form class="create-edit-form" action="postCreation.php" method="post" enctype="multipart/form-data">
            <label class="label-create-edit" for="title">Post Title</label>
            <input type="text" name="title" class="input-create-edit" placeholder="Enter the title of your post">
            <label class="label-create-edit" for="content">Post Content</label>
            <textarea name="content" rows="10" id="textarea" class="textarea-create-edit" placeholder="Enter the content of your post"></textarea>
            <label class="label-create-edit" for="fileToUpload">Upload photo</label>
            <input type="file" class="fileToUpload" name="fileToUpload">
            <button type="submit" class="button button-submit">Create Post</button>
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