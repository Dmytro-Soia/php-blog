<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $logpost = filter_input(INPUT_POST, "logout");
    if (isset($_POST[$logpost])) {
        unset($_SESSION["connected"]);
        header("Location: /login.php");
    }
}
