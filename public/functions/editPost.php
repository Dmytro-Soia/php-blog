<?php
session_start();
$chosenID = filter_input(INPUT_GET, "postId", FILTER_SANITIZE_NUMBER_INT);
require "functions/databaseConnection.php";
try {
    $stmt = $pdo->prepare("SELECT * FROM blog_post WHERE id = :id");
    $stmt->execute(["id" => $chosenID]);
    $chosenPost = $stmt->fetch();

} catch (Exception $e) {
    array_push($errors, "Cannot charge your post");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "functions/savePhotoToFolder.php";
    $newTitle = filter_input(INPUT_POST, "title");
    $newContent = filter_input(INPUT_POST, "content");
    $newChosenId = filter_input(INPUT_POST, "newPostId");
    if ($newTitle === "" || $newContent === "") {
        array_push($errors, "One of needed value is empty");
    };
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
                array_push($errors, "Cannot edit this post");
            }
        } else {
            try {
                $newstmt = $pdo->prepare("UPDATE blog_post SET title = :title, content = :content WHERE id = :id");
                $newstmt->execute(["title" => $newTitle, "content" => $newContent, "id" => $newChosenId]);

            } catch (Exception $e) {
                array_push($errors, "Cannot edit this post");
            }
        }
        $_SESSION['flash_message'] = "The post has been edited!";
        header("Location: index.php");
    } catch (Exception $e) {
        array_push($errors, "Cannot edit your post");
    }
}
