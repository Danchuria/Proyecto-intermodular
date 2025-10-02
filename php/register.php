<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en DB
    $stmt = $pdo->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");
    try {
        $stmt->execute([$username, $passwordHash]);
        $_SESSION["user"] = $username;
        header("Location: index.php"); // Redirigir a la página principal
        exit;
    } catch (PDOException $e) {
        echo "Error: El usuario ya existe.";
    }
}
?>

<form method="POST">
    <h2>Crear cuenta</h2>
    Usuario: <input type="text" name="username" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <button type="submit">Registrarse</button>
</form>
