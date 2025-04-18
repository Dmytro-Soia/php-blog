<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = filter_input(INPUT_GET, "postID", FILTER_SANITIZE_NUMBER_INT);
    require "databaseConnection.php";
    try {
        $stmt = $pdo->prepare("SELECT * FROM blog_post WHERE id = :id");
        $stmt->execute(["id" => $id]);
        $chosenPost = $stmt->fetch();
    } catch (Exception $e) {
        push_flash_message("Cannot display this post");
    }
}
