<?php
require_once "functions/auth.php";
connected();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, "username");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, "pass");
    if ($username === "" || $email === "" || $pass === "") {
        push_flash_message("One of needed value is empty");
    }
    if (count($_SESSION["flash_messages"]) === 0) {
        require "databaseConnection.php";
        try {
            $email_check = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $email_check->execute(["email" => $email]);
            $usermail = $email_check->fetch();
            if ($usermail) {
                push_flash_message("Email already exist in database");
            }
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, pass) VALUES (:username, :email, :pass)");
            $stmt->execute(["username" => $username, "email" => $email, "pass" => $hash]);
            header("Location: login.php");
            exit();
        } catch (Exception $e) {
            push_flash_message("Problem with database access");
        }
    }
}
