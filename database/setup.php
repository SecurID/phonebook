<?php
$config = require __DIR__ . '/../config/config.php';
$pdo = new PDO($config['db']['dsn']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("CREATE TABLE IF NOT EXISTS phonebook (
    id INTEGER PRIMARY KEY,
    lastname TEXT NOT NULL,
    firstname TEXT NOT NULL,
    phonenumber TEXT NOT NULL
)");
