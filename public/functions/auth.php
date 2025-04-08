<?php
require_once "functions/flashMessages.php";
function check_connection()
{
    if (isset($_SESSION["userID"])) {
        return $_SESSION["userID"];
    } else {
        return null;
    }
}

function creator_id()
{
    require "databaseConnection.php";
    $postID = filter_input(INPUT_GET, "postId");
    $stmt = $pdo->prepare("SELECT user_id FROM blog_post WHERE id = :id");
    $stmt->execute(["id" => $postID]);
    $creatorID = $stmt->fetch();
    return $creatorID["user_id"];

}

function connected()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        date_default_timezone_set("Europe/Zurich");
    }
    return !empty($_SESSION["userID"]);
}

function forced_connection($user)
{
    if (!isset($user)) {
        header("Location: login.php");
        exit();
    }
}

function forced_connection_and_same_user($connected_user, $user_id)
{
    if ($connected_user !== $user_id) {
        header("Location: index.php");
        exit();
    }
}

function login()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $pass = filter_input(INPUT_POST, "pass");
        $_SESSION["flash_messages"] = [];
        if ($email === "" || $pass === "") {
            push_flash_message("One of needed value is empty");
        }
        if (count($_SESSION["flash_messages"]) === 0) {
            require_once "databaseConnection.php";
            try {
                $user_check = $pdo->prepare("SELECT * FROM users WHERE email = :email");
                $user_check->execute(["email" => $email]);
                $existed_user = $user_check->fetch();
                if ($existed_user && password_verify($pass, $existed_user["pass"])) {
                    $_SESSION["userID"] = $existed_user["id"];
                    header("Location: index.php");
                    exit();
                } else {
                    push_flash_message("User does not exist");
                }
            } catch (Exception $e) {
                push_flash_message("Problem with database access");
            }
        }
    }
}

function logout()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $logpost = filter_input(INPUT_POST, "logout");
        if (isset($_POST[$logpost])) {
            session_destroy();
            header("Location: /login.php");
        }
    }
}
