<?php
session_start();
$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito</title>
</head>
<body>
<h2>Tu Carrito</h2>
<ul>
<?php
if (isset($_SESSION['carrito'])) {
    foreach($_SESSION['carrito'] as $item) {
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;
        echo "<li>".$item['nombre']." x".$item['cantidad']." - ".$subtotal." €</li>";
    }
} else {
    echo "<li>Carrito vacío</li>";
}
?>
</ul>
<p><b>Total: <?php echo $total; ?> €</b></p>
<a href="index.php">Seguir comprando</a>
</body>
</html>
