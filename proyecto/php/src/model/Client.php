<?php
require_once "User.php";

class Client extends User {
    private $IBAN;

    public function __construct($idUser = null, $numeroTelefono = null, $email = null, $nombre = null, $IBAN = null) {
        parent::__construct($idUser, $numeroTelefono, $email, $nombre, "CLIENTE");
        $this->IBAN = $IBAN;
    }

    public function getIBAN() { return $this->IBAN; }
    public function setIBAN($IBAN) { $this->IBAN = $IBAN; }

    public function __toString() {
        return parent::__toString() . ", IBAN='" . $this->IBAN . "'}";
    }
}
