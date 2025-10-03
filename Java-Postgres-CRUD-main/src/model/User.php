<?php
class User {
    protected $idUser;
    protected $numeroTelefono;
    protected $email;
    protected $nombre;
    protected $tipoUsuario;

    public function __construct($idUser = null, $numeroTelefono = null, $email = null, $nombre = null, $tipoUsuario = null) {
        $this->idUser = $idUser;
        $this->numeroTelefono = $numeroTelefono;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->tipoUsuario = $tipoUsuario;
    }

    // Getters
    public function getIdUser() { return $this->idUser; }
    public function getNumeroTelefono() { return $this->numeroTelefono; }
    public function getEmail() { return $this->email; }
    public function getNombre() { return $this->nombre; }
    public function getTipoUsuario() { return $this->tipoUsuario; }

    // Setters
    public function setIdUser($idUser) { $this->idUser = $idUser; }
    public function setNumeroTelefono($numeroTelefono) { $this->numeroTelefono = $numeroTelefono; }
    public function setEmail($email) { $this->email = $email; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setTipoUsuario($tipoUsuario) { $this->tipoUsuario = $tipoUsuario; }

    public function __toString() {
        return "User{" .
               "idUser=" . $this->idUser .
               ", numeroTelefono=" . $this->numeroTelefono .
               ", email='" . $this->email . "'" .
               ", nombre='" . $this->nombre . "'" .
               ", tipoUsuario='" . $this->tipoUsuario . "'" .
               "}";
    }
}
