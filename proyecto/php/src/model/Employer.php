<?php
require_once "User.php";

class Employer extends User {
    private $fechaContrato;
    private $departamento;
    private $salario;
    private $rango;
    private $descuento;
    private $IBAN;

    public function __construct($idUser = null, $numeroTelefono = null, $email = null, $nombre = null,
                                $fechaContrato = null, $departamento = null, $salario = null,
                                $rango = null, $descuento = null, $IBAN = null) {
        parent::__construct($idUser, $numeroTelefono, $email, $nombre, "EMPLOYER");
        $this->fechaContrato = $fechaContrato;
        $this->departamento = $departamento;
        $this->salario = $salario;
        $this->rango = $rango;
        $this->descuento = $descuento;
        $this->IBAN = $IBAN;
    }

    // Getters y setters ...
    public function getFechaContrato() { return $this->fechaContrato; }
    public function getDepartamento() { return $this->departamento; }
    public function getSalario() { return $this->salario; }
    public function getRango() { return $this->rango; }
    public function getDescuento() { return $this->descuento; }
    public function getIBAN() { return $this->IBAN; }

    public function setFechaContrato($f) { $this->fechaContrato = $f; }
    public function setDepartamento($d) { $this->departamento = $d; }
    public function setSalario($s) { $this->salario = $s; }
    public function setRango($r) { $this->rango = $r; }
    public function setDescuento($d) { $this->descuento = $d; }
    public function setIBAN($i) { $this->IBAN = $i; }

    public function __toString() {
        return parent::__toString() .
               ", fechaContrato=" . $this->fechaContrato .
               ", departamento='" . $this->departamento . "'" .
               ", salario=" . $this->salario .
               ", rango='" . $this->rango . "'" .
               ", descuento=" . $this->descuento .
               ", IBAN='" . $this->IBAN . "'}";
    }
}
