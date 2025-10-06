<?php
class Products {
    private $idProducto;
    private $nombre;
    private $categoria;
    private $cantidad;
    private $precio;

    public function __construct($idProducto = null, $nombre = null, $categoria = null, $cantidad = null, $precio = null) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    // Getters
    public function getIdProducto() { return $this->idProducto; }
    public function getNombre() { return $this->nombre; }
    public function getCategoria() { return $this->categoria; }
    public function getCantidad() { return $this->cantidad; }
    public function getPrecio() { return $this->precio; }

    // Setters
    public function setIdProducto($idProducto) { $this->idProducto = $idProducto; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }
    public function setCantidad($cantidad) { $this->cantidad = $cantidad; }
    public function setPrecio($precio) { $this->precio = $precio; }

    public function __toString() {
        return "Products{" .
               "idProducto=" . $this->idProducto .
               ", nombre='" . $this->nombre . "'" .
               ", categoria='" . $this->categoria . "'" .
               ", cantidad=" . $this->cantidad .
               ", precio=" . $this->precio .
               "}";
    }
}
