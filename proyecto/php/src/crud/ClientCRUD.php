<?php
require_once "Database.php";
require_once "Client.php";

class ClientCRUD {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // INSERTAR CLIENTE
    public function insertarCliente(Client $client) {
        try {
            $this->conn->beginTransaction();

            // Insertar en users
            $queryUser = "INSERT INTO users (numeroTelefono, email, nombre, tipoUsuario) 
                          VALUES (:numeroTelefono, :email, :nombre, :tipoUsuario)";
            $stmtUser = $this->conn->prepare($queryUser);
            $stmtUser->bindValue(":numeroTelefono", $client->getNumeroTelefono());
            $stmtUser->bindValue(":email", $client->getEmail());
            $stmtUser->bindValue(":nombre", $client->getNombre());
            $stmtUser->bindValue(":tipoUsuario", $client->getTipoUsuario());
            $stmtUser->execute();

            $idUser = $this->conn->lastInsertId();

            // Insertar en clients
            $queryClient = "INSERT INTO clients (idUser, IBAN) VALUES (:idUser, :IBAN)";
            $stmtClient = $this->conn->prepare($queryClient);
            $stmtClient->bindValue(":idUser", $idUser);
            $stmtClient->bindValue(":IBAN", $client->getIBAN());
            $stmtClient->execute();

            $this->conn->commit();
            return $idUser;

        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Error al insertar cliente: " . $e->getMessage();
            return null;
        }
    }
}
