<?php

require_once "functions/auth.php";
connected();
$chosenID = filter_input(INPUT_GET, "postId", FILTER_SANITIZE_NUMBER_INT);
require "functions/databaseConnection.php";
require_once "functions/flashMessages.php";
try {
    $stmt = $pdo->prepare("SELECT * FROM blog_post WHERE id = :id");
    $stmt->execute(["id" => $chosenID]);
    $chosenPost = $stmt->fetch();
} catch (Exception $e) {
    push_flash_message("Cannot charge your post");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "functions/savePhotoToFolder.php";
    $newTitle = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $newContent = filter_input(INPUT_POST, "content", FILTER_SANITIZE_SPECIAL_CHARS);
    $newChosenId = filter_input(INPUT_POST, "newPostId", FILTER_SANITIZE_NUMBER_INT);
    if ($newTitle === "" || $newContent === "") {
        push_flash_message("One of needed value is empty");
    };
    if (!is_flash_message()) {
        try {
            if ($photo !== "" && $photo !== null) {
                try {
                    $stmt = $pdo->prepare("SELECT * FROM blog_post WHERE id = :id");
                    $stmt->execute(["id" => $newChosenId]);
                    $photoToDelete = $stmt->fetch();
                    unlink("./images/" . $photoToDelete["photo"]);

                    $newstmt = $pdo->prepare("UPDATE blog_post SET title = :title, photo = :photo, content = :content WHERE id = :id");
                    $newstmt->execute(["title" => $newTitle, "content" => $newContent, "photo" => $photo, "id" => $newChosenId]);
                } catch (Exception $e) {
                    push_flash_message("Cannot edit this post");
                }
            } else {
                try {
                    $newstmt = $pdo->prepare("UPDATE blog_post SET title = :title, content = :content WHERE id = :id");
                    $newstmt->execute(["title" => $newTitle, "content" => $newContent, "id" => $newChosenId]);

                } catch (Exception $e) {
                    push_flash_message("Cannot edit this post");
                }
            }
            push_flash_message("The post has been edited!");
            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            push_flash_message("Cannot edit your post");
        }
    }
}
