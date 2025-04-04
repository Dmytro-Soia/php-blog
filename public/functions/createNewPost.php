<?php

session_start();

$title = filter_input(INPUT_POST, "title");
$content = filter_input(INPUT_POST, "content");
$localtime = date("Y-m-d H:i");
if ($title === "" || $content === "") {
    array_push($errors, "One of needed value is empty");
}
if (count($errors) === 0) {
    require "databaseConnection.php";
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        $stmt = $pdo->prepare("INSERT INTO blog_post (title, photo, content, created_at, user_id)
            VALUES (:title, :photo, :content, :localtime, 1)");
        $stmt->execute(["title" => $title, "photo" => $photo, "content" => $content, "localtime" => $localtime]);
        header("Location: index.php");
    } catch (Exception $e) {
        array_push($errors, "Cannot add new post to database");
    }
}
