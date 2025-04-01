<?php
$dns = "sqlite:../database.db";
$user = "root";
$pass = "";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dns, $user, $pass, $options);
    $stmt = $pdo->prepare("SELECT * FROM blog_post ORDER BY created_at DESC");
    $stmt->execute();
    $allPosts = $stmt->fetchAll();
} catch (Exception $e) {
    array_push($errors, "Cannot download posts from database");
}
