<?php 
include("db.php"); 
$id = intval($_GET['id']); 

$sql = "SELECT * FROM Products WHERE idProducts = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo $product['Nombre']; ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2><?php echo $product['Nombre']; ?></h2>
  <p><?php echo $product['Descripción']; ?></p>
  <p><b><?php echo $product['Precio']; ?> €</b></p>

  <form action="carrito.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $product['idProducts']; ?>">
    <input type="number" name="cantidad" value="1" min="1">
    <button type="submit">Añadir al carrito</button>
  </form>

  <a href="index.php">Seguir comprando</a>
</div>

</body>
</html>
