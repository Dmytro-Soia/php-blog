<?php

require_once "functions/auth.php";
require_once "functions/flashMessages.php";
connected();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
    if ($username === "" || $email === "" || $pass === "") {
        push_flash_message("One of needed value is empty");
    }
    if (mb_strlen($pass) < 9) {
        push_flash_message("Your password is less than 9 characters!");
    }
    if (!is_flash_message()) {
        require "databaseConnection.php";
        try {
            $email_check = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $email_check->execute(["email" => $email]);
            $usermail = $email_check->fetch();
            if ($usermail) {
                push_flash_message("Email already exist in database");
            }
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, pass, prof_pic) VALUES (:username, :email, :pass, :prof_pic)");
            $stmt->execute(["username" => $username, "email" => $email, "pass" => $hash, "prof_pic" => "def.png"]);
            header("Location: login.php");
            exit();
        } catch (Exception $e) {
            push_flash_message("Problem with database access");
        }
    }
}
