<?php 
if ($_SERVER["REQUEST_METHOD"] === "GET") {
$id = filter_input(INPUT_GET, "postID");

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
    $stmt = $pdo->prepare("SELECT * FROM blog_post WHERE id = :id");
    $stmt->execute(["id" => $id]);
    $chosenPost = $stmt->fetch();
} catch (Exception $e) {
    array_push($errors, "Cannot display this post");
}
}