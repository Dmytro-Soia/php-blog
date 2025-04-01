<?php

function connected()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        date_default_timezone_set("Europe/Zurich");
    }
    return !empty($_SESSION["userID"]);
}

function forced_connection()
{
    if (!connected()) {
        header("Location: login.php");
        exit();
    }
}
