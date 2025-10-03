<?php
require_once "Database.php";
require_once "User.php";

class UserCRUD {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Insertar usuario
    public function insertarUser(User $user) {
        try {
            $query = "INSERT INTO users (idUser, numeroTelefono, email, nombre, tipoUsuario) 
                      VALUES (:idUser, :numeroTelefono, :email, :nombre, :tipoUsuario)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":idUser", $user->getIdUser());
            $stmt->bindValue(":numeroTelefono", $user->getNumeroTelefono());
            $stmt->bindValue(":email", $user->getEmail());
            $stmt->bindValue(":nombre", $user->getNombre());
            $stmt->bindValue(":tipoUsuario", $user->getTipoUsuario());

            $stmt->execute();
            echo "Usuario insertado exitosamente.";
        } catch (PDOException $e) {
            echo "Error al insertar usuario: " . $e->getMessage();
        }
    }

    // Obtener todos los usuarios
    public function obtenerUsers() {
        $users = [];
        try {
            $query = "SELECT * FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new User(
                    $row["idUser"],
                    $row["numeroTelefono"],
                    $row["email"],
                    $row["nombre"],
                    $row["tipoUsuario"]
                );
            }
        } catch (PDOException $e) {
            echo "Error al obtener usuarios: " . $e->getMessage();
        }
        return $users;
    }
}
