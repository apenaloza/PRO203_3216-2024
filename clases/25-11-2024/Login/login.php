<?php
    session_start();
    require './config/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Validación de entradas (OWASP: Input Validation)
        if (empty($username) || empty($password)) {
            die("Por favor completa todos los campos.");
        }

        // Consultar al usuario
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Establecer sesión segura
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit;
        } else {
            echo "Credenciales incorrectas.";
        }
    }
