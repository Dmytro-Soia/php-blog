<?php

$dsn = "sqlite:../database.db";
$user = "root";
$passw = "";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $passw, $options);
$pdo->exec("PRAGMA journal_mode=WAL;");
