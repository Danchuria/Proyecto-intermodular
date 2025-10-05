<?php
$host = "localhost";
$user = "root";   // tu usuario de la BD
$pass = "";       // tu contraseña de la BD
$dbname = "tienda";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
