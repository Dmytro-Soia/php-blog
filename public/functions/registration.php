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
        $dsn = "sqlite:../database.db";
        $user = "root";
        $passw = "";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($dsn, $user, $passw, $options);
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
