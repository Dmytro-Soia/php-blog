<?php
session_start();
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST, "pass");
    if ($email === "" || $pass === "") {
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
            $user_check = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $user_check->execute(["email" => $email]);
            $existed_user = $user_check->fetch();
            if ($existed_user && password_verify($pass, $existed_user["pass"])) {
                $_SESSION["connected"] = 1;
                header("Location: index.php");
            } else {
                array_push($errors, "User does not exist");
            }
        } catch (Exception $e) {
            array_push($errors, "Problem with database access");
        }
    }
}
