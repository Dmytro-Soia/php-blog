<?php
require_once "functions/auth.php";
connected();
require_once "functions/flashMessages.php";
require "databaseConnection.php";
$id = $_SESSION["userID"];
try {
    $poststmt = $pdo->prepare("SELECT * FROM blog_post WHERE user_id = :id ORDER BY id DESC");
    $poststmt->execute(["id" => $id]);
    $userstmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $userstmt->execute(["id" => $id]);
    $userInfo = $userstmt->fetch();
    $userPosts = $poststmt->fetchAll();
} catch (Exception $e) {
    push_flash_message("Cannot download posts from database");
}
