<?php

session_start();

$title = filter_input(INPUT_POST, "title");
$content = filter_input(INPUT_POST, "content");
$localtime = date("Y-m-d H:i");
$id = $_SESSION["userID"];
if ($title === "" || $content === "") {
    array_push($errors, "One of needed value is empty");
}
if (count($errors) === 0) {
    require_once "databaseConnection.php";
    try {
        $stmt = $pdo->prepare("INSERT INTO blog_post (title, photo, content, created_at, user_id)
            VALUES (:title, :photo, :content, :localtime, :id)");
        $stmt->execute(["title" => $title, "photo" => $photo, "content" => $content, "localtime" => $localtime, "id" => $id]);
        $_SESSION['flash_message'] = "The post has been created!";
        header("Location: index.php");
    } catch (Exception $e) {
        array_push($errors, "Cannot add new post to database");
    }
}
