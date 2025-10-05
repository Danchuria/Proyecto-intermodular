<?php
// create_product.php

header("Access-Control-Allow-Origin: *"); // permite peticiones desde localhost
header("Content-Type: application/json; charset=utf-8");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    require_once __DIR__ . "/model/Products.php";
    require_once __DIR__ . "/crud/ProductsCRUD.php";

    // Leer el cuerpo JSON enviado desde el frontend
    $inputJSON = file_get_contents("php://input");
    $data = json_decode($inputJSON, true);

    if (!$data) {
        echo json_encode([
            "success" => false,
            "message" => "❌ No llegaron datos válidos",
            "raw" => $inputJSON
        ]);
        exit;
    }

    // Log de depuración
    error_log("📩 Datos recibidos: " . print_r($data, true));

    // Validar campos obligatorios
    if (
        !isset($data["nombre"]) ||
        !isset($data["categoria"]) ||
        !isset($data["cantidad"]) ||
        !isset($data["precio"])
    ) {
        echo json_encode([
            "success" => false,
            "message" => "❌ Faltan campos obligatorios",
            "data" => $data
        ]);
        exit;
    }

    // Crear objeto producto
    $producto = new Products(
        $data["idProducto"] ?? 0,
        $data["nombre"],
        $data["categoria"],
        $data["cantidad"],
        $data["precio"]
    );

    // Crear instancia del CRUD
    $crud = new ProductsCRUD();
    $resultado = $crud->insertarProducto($producto);

    if ($resultado) {
        echo json_encode([
            "success" => true,
            "message" => "✅ Producto insertado correctamente",
            "producto" => $data
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "⚠️ Error al insertar en la base de datos"
        ]);
    }

} catch (Throwable $e) {
    // Capturar cualquier error inesperado
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "💥 Error interno del servidor",
        "error" => $e->getMessage(),
        "file" => $e->getFile(),
        "line" => $e->getLine()
    ]);
}

