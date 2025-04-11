<?php

require_once "functions/auth.php";
require_once "functions/flashMessages.php";
require "functions/databaseConnection.php";
if (!is_flash_message()) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $allUsers = $stmt->fetchAll();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                $adminToChange = filter_input(INPUT_POST, "adminChanges", FILTER_SANITIZE_NUMBER_INT);
                $changes = filter_input(INPUT_POST, "admin", FILTER_SANITIZE_SPECIAL_CHARS);
                if ($changes === null) {
                    $newstmt = $pdo->prepare("UPDATE users SET administrator = :administrator WHERE id = :id");
                    $newstmt->execute(["administrator" => 0, "id" => $adminToChange]);
                    header("Location: adminPanel.php");
                    exit();
                } else {
                    $newstmt = $pdo->prepare("UPDATE users SET administrator = :administrator WHERE id = :id");
                    $newstmt->execute(["administrator" => 1, "id" => $adminToChange]);
                    header("Location: adminPanel.php");
                    exit();
                }
            } catch (Exception $e) {
                push_flash_message("Cannot update admin");
            }
        }
    } catch (Exception $e) {
        push_flash_message("Cannot get acces to database");
    }
}
