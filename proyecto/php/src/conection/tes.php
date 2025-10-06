<?php
require_once "DataBase.php";

// Crear objeto Database
$db = new Database();

// Intentar conexión
$conn = $db->getConnection();

if ($conn) {
    echo "<h2 style='color:green;'>✅ Conexión exitosa a la base de datos</h2>";
} else {
    echo "<h2 style='color:red;'>❌ No se pudo conectar a la base de datos</h2>";
}
