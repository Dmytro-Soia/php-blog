<?php

require_once "functions/auth.php";
connected();
require "functions/databaseConnection.php";
require_once "functions/flashMessages.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require "functions/savePhotoToFolder.php";
    $newUsername = filter_input(INPUT_POST, "username");
    $newBio = filter_input(INPUT_POST, "bio");
    $userInfoId = filter_input(INPUT_POST, "userInfoId", FILTER_SANITIZE_NUMBER_INT);
    if ($newUsername === "" || $newBio === "") {
        push_flash_message("One of needed value is empty");
    };

    if (!is_flash_message()) {
        try {
            if (!empty($photo)) {
                try {
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
                    $stmt->execute(["id" => $userInfoId]);
                    $photoToDelete = $stmt->fetch();
                    if ($photoToDelete["prof_pic"] !== "def.png") {
                        unlink("./images/" . $photoToDelete["prof_pic"]);
                    }
                    $newstmt = $pdo->prepare("UPDATE users SET username = :username, prof_pic = :prof_pic, bio = :bio WHERE id = :id");
                    $newstmt->execute(["username" => $newUsername, "bio" => $newBio, "prof_pic" => $photo, "id" => $userInfoId]);
                } catch (Exception $e) {
                    push_flash_message("Cannot edit your info $e");
                    header("Location: userInfoEdit.php");
                    exit();
                }
            } else {
                try {
                    $newstmt = $pdo->prepare("UPDATE users SET username = :username, bio = :bio WHERE id = :id");
                    $newstmt->execute(["username" => $newUsername, "bio" => $newBio, "id" => $userInfoId]);
                } catch (Exception $e) {
                    push_flash_message("Cannot edit your info $e");
                    header("Location: userInfoEdit.php");
                    exit();
                }
            }
            push_flash_message("Your info has been edited!");
            header("Location: userProfile.php");
            exit();
        } catch (Exception $e) {
            push_flash_message("Cannot edit your info");
        }
    }
}
