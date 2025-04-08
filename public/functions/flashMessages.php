<?php
session_start();
function push_flash_message($message) {
    $_SESSION['flash_messages'][] = $message;
}

function is_flash_message() {
    return !empty($_SESSION['flash_messages']);
}

function get_flash_messages() {
    $messages = empty($_SESSION['flash_messages']) ? [] : $_SESSION['flash_messages'];
    unset($_SESSION["flash_messages"]);
    return $messages;
}
