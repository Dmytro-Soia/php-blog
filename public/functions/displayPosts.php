<?php

require "databaseConnection.php";
try {
    $stmt = $pdo->prepare("SELECT * FROM blog_post ORDER BY created_at DESC");
    $stmt->execute();
    $allPosts = $stmt->fetchAll();
} catch (Exception $e) {
    array_push($errors, "Cannot download posts from database");
}
