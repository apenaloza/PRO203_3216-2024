<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'login');
define('DB_USER', 'root'); // Cambiar si aplica
define('DB_PASS', ''); // Cambiar si aplica

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
