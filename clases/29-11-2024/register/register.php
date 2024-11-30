<?php
require './config/config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

  
    if (empty($username) || empty($password) || empty($confirmPassword)) {
        die("Por favor, completa todos los campos.");
    }

    if ($password !== $confirmPassword) {
        die("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
    }


    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        die("El nombre de usuario ya está en uso.");
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

   
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
        $stmt->execute([$username, $passwordHash]);

       
        header("Location: index.html");
        exit; 
    } catch (Exception $e) {
        die("Error en el registro: " . $e->getMessage());
    }
}
