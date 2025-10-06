<?php
require_once "Database.php";
require_once "Employer.php";

class EmployerCRUD {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // INSERTAR EMPLOYER
    public function insertarEmployer(Employer $employer) {
        try {
            $this->conn->beginTransaction();

            // Insertar en users
            $queryUser = "INSERT INTO users (numeroTelefono, email, nombre, tipoUsuario) 
                          VALUES (:numeroTelefono, :email, :nombre, :tipoUsuario)";
            $stmtUser = $this->conn->prepare($queryUser);
            $stmtUser->bindValue(":numeroTelefono", $employer->getNumeroTelefono());
            $stmtUser->bindValue(":email", $employer->getEmail());
            $stmtUser->bindValue(":nombre", $employer->getNombre());
            $stmtUser->bindValue(":tipoUsuario", $employer->getTipoUsuario());
            $stmtUser->execute();

            $idUser = $this->conn->lastInsertId();

            // Insertar en employers
            $queryEmployer = "INSERT INTO employers (idUser, fechaContrato, departamento, salario, rango, descuento, IBAN)
                              VALUES (:idUser, :fechaContrato, :departamento, :salario, :rango, :descuento, :IBAN)";
            $stmtEmployer = $this->conn->prepare($queryEmployer);
            $stmtEmployer->bindValue(":idUser", $idUser);
            $stmtEmployer->bindValue(":fechaContrato", $employer->getFechaContrato());
            $stmtEmployer->bindValue(":departamento", $employer->getDepartamento());
            $stmtEmployer->bindValue(":salario", $employer->getSalario());
            $stmtEmployer->bindValue(":rango", $employer->getRango());
            $stmtEmployer->bindValue(":descuento", $employer->getDescuento());
            $stmtEmployer->bindValue(":IBAN", $employer->getIBAN());
            $stmtEmployer->execute();

            $this->conn->commit();
            return $idUser;

        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Error al insertar employer: " . $e->getMessage();
            return null;
        }
    }
}
