<?php
class Database {
    private $host = "localhost";   // tu host
    private $db_name = "mi_base";  // nombre de la base de datos
    private $username = "root";    // usuario
    private $password = "";        // contraseña
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8"); // Codificación UTF-8
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
