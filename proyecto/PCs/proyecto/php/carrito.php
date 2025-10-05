<?php
session_start();
include("db.php");

$id = $_POST['id'];
$cantidad = $_POST['cantidad'];

// Buscar producto
$sql = "SELECT * FROM Products WHERE idProducts = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

// Añadir al carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$_SESSION['carrito'][] = [
    "id" => $product['idProducts'],
    "nombre" => $product['Nombre'],
    "precio" => $product['Precio'],
    "cantidad" => $cantidad
];

header("Location: ver_carrito.php");
