<?php
require_once __DIR__ . '/../conection/DataBase.php';
require_once __DIR__ . '/../model/Products.php';

class ProductsCRUD {
    private $conn;

    public function __construct() {
        // Conexión MySQL (puedes ajustar el nombre de la base si difiere)
        $this->conn = new mysqli("localhost", "root", "", "productosdb");
        if ($this->conn->connect_error) {
            die("❌ Error de conexión: " . $this->conn->connect_error);
        }
    }

    /**
     * Insertar producto en la BD
     */
    public function insertarProducto(Products $producto) {
    $sql = "INSERT INTO Products (`Nombre`, `Categoría`, `Cantidad`, `Precio`) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);

    if (!$stmt) {
        error_log("Error en prepare: " . $this->conn->error);
        return false;
    }

    $stmt->bind_param(
        "ssdi",
        $producto->getNombre(),
        $producto->getCategoria(),
        $producto->getCantidad(),
        $producto->getPrecio()
    );

    if (!$stmt->execute()) {
        error_log("Error MySQL: " . $stmt->error);
        return false;
    }

    return true;
}

    /**
     * Obtener todos los productos
     */
    public function obtenerProductos() {
        $productos = [];
        $sql = "SELECT * FROM products";
        $resultado = $this->conn->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $productos[] = new Products(
                    $row["idProducto"],
                    $row["nombre"],
                    $row["categoria"],
                    $row["cantidad"],
                    $row["precio"]
                );
            }
        }

        return $productos;
    }

    /**
     * Buscar productos por nombre o categoría
     */
    public function buscarProductos($texto) {
        $productos = [];
        $sql = "SELECT * FROM products 
                WHERE nombre LIKE ? OR categoria LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $param = "%" . $texto . "%";
        $stmt->bind_param("ss", $param, $param);
        $stmt->execute();
        $resultado = $stmt->get_result();

        while ($row = $resultado->fetch_assoc()) {
            $productos[] = new Products(
                $row["idProducto"],
                $row["nombre"],
                $row["categoria"],
                $row["cantidad"],
                $row["precio"]
            );
        }

        return $productos;
    }

    /**
     * Actualizar producto
     */
    public function actualizarProducto(Products $producto) {
        $sql = "UPDATE products 
                SET nombre = ?, categoria = ?, cantidad = ?, precio = ?
                WHERE idProducto = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssiii",
            $producto->getNombre(),
            $producto->getCategoria(),
            $producto->getCantidad(),
            $producto->getPrecio(),
            $producto->getIdProducto()
        );

        return $stmt->execute();
    }

    /**
     * Eliminar producto
     */
    public function eliminarProducto($idProducto) {
        $sql = "DELETE FROM products WHERE idProducto = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idProducto);
        return $stmt->execute();
    }
}
