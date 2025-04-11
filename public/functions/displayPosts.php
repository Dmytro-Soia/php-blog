<?php

require_once "functions/auth.php";
connected();
require_once "functions/flashMessages.php";
require "databaseConnection.php";
try {
    $stmt = $pdo->prepare("SELECT * FROM blog_post ORDER BY created_at DESC");
    $stmt->execute();
    $allPosts = $stmt->fetchAll();
} catch (Exception $e) {
    push_flash_message("Cannot download posts from database");
}
