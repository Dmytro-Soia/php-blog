<?php

function connected()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION["connected"]);
}

function forced_connection()
{
    if (!connected()) {
        header("Location: login.php");
        exit();
    }
}
