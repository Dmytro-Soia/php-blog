<?php

$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, "username");
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $pass = filter_input(INPUT_POST, "pass");
    if ($username === "" || $email === "" || $pass === "") {
        array_push($errors, "One of needed value is empty");
    }
    if (count($errors) === 0) {
        require "databaseConnection.php";
        try {
            $email_check = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $email_check->execute(["email" => $email]);
            $usermail = $email_check->fetch();
            if ($usermail) {
                array_push($errors, "Email already exist in database");
            }
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, email, pass) VALUES (:username, :email, :pass)");
            $stmt->execute(["username" => $username, "email" => $email, "pass" => $hash]);
            header("Location: login.php");
            exit();
        } catch (Exception $e) {
            array_push($errors, "Problem with database access");
        }
    }
}
