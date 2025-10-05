<?php
require_once "Database.php";
require_once "Products.php";

class ProductsCRUD {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Insertar producto
    public function insertarProducto(Products $producto) {
        try {
            $query = "INSERT INTO productos (idProducto, nombre, categoria, cantidad, precio) 
                      VALUES (:idProducto, :nombre, :categoria, :cantidad, :precio)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":idProducto", $producto->getIdProducto());
            $stmt->bindValue(":nombre", $producto->getNombre());
            $stmt->bindValue(":categoria", $producto->getCategoria());
            $stmt->bindValue(":cantidad", $producto->getCantidad());
            $stmt->bindValue(":precio", $producto->getPrecio());

            $stmt->execute();
            echo "Producto insertado exitosamente.";
        } catch (PDOException $e) {
            echo "Error al insertar producto: " . $e->getMessage();
        }
    }

    // Obtener todos los productos
    public function obtenerProductos() {
        $productos = [];
        try {
            $query = "SELECT * FROM productos";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $productos[] = new Products(
                    $row["idProducto"],
                    $row["nombre"],
                    $row["categoria"],
                    $row["cantidad"],
                    $row["precio"]
                );
            }
        } catch (PDOException $e) {
            echo "Error al obtener productos: " . $e->getMessage();
        }
        return $productos;
    }

    // 🔍 Buscar productos por nombre o categoría
    public function buscarProductos($texto) {
        $productos = [];
        try {
            $query = "SELECT * FROM productos 
                      WHERE nombre LIKE :texto OR categoria LIKE :texto";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":texto", "%" . $texto . "%");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $productos[] = new Products(
                    $row["idProducto"],
                    $row["nombre"],
                    $row["categoria"],
                    $row["cantidad"],
                    $row["precio"]
                );
            }
        } catch (PDOException $e) {
            echo "Error al buscar productos: " . $e->getMessage();
        }
        return $productos;
    }

    // Actualizar producto
    public function actualizarProducto(Products $producto) {
        try {
            $query = "UPDATE productos 
                      SET nombre = :nombre, categoria = :categoria, cantidad = :cantidad, precio = :precio 
                      WHERE idProducto = :idProducto";
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(":idProducto", $producto->getIdProducto());
            $stmt->bindValue(":nombre", $producto->getNombre());
            $stmt->bindValue(":categoria", $producto->getCategoria());
            $stmt->bindValue(":cantidad", $producto->getCantidad());
            $stmt->bindValue(":precio", $producto->getPrecio());

            $stmt->execute();
            echo "Producto actualizado exitosamente.";
        } catch (PDOException $e) {
            echo "Error al actualizar producto: " . $e->getMessage();
        }
    }

    // Eliminar producto
    public function eliminarProducto($idProducto) {
        try {
            $query = "DELETE FROM productos WHERE idProducto = :idProducto";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":idProducto", $idProducto);
            $stmt->execute();
            echo "Producto eliminado exitosamente.";
        } catch (PDOException $e) {
            echo "Error al eliminar producto: " . $e->getMessage();
        }
    }
}
