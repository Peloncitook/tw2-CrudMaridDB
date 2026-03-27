<?php

define('DB_HOST', '172.25.0.228');
define('DB_USER', 'root');
define('DB_PASS', 'denil54321');
define('DB_NAME', 'db01');

function getConnection() {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    
    try {
        $conn = new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        die("Conexión fallida: " . $e->getMessage());
    }
    
    return $conn;
}
