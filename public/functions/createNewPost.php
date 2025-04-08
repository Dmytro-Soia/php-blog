<?php
require_once "functions/flashMessages.php";

$title = filter_input(INPUT_POST, "title");
$content = filter_input(INPUT_POST, "content");
$localtime = date("Y-m-d H:i");
$id = $_SESSION["userID"];
if ($title === "" || $content === "") {
    push_flash_message("One of needed value is empty");
}
if (count($_SESSION["flash_messages"]) === 0) {
    require "databaseConnection.php";
    try {
        $stmt = $pdo->prepare("INSERT INTO blog_post (title, photo, content, created_at, user_id)
            VALUES (:title, :photo, :content, :localtime, :id)");
        $stmt->execute(["title" => $title, "photo" => $photo, "content" => $content, "localtime" => $localtime, "id" => $id]);
        push_flash_message("The post has been created!");
        header("Location: index.php");
    } catch (Exception $e) {
        push_flash_message("Cannot add new post to database");
    }
}
