<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tienda Online</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
echo "Bienvenido, " . $_SESSION["user"];
?>

<h1>Bienvenido a Amamortadela</h1>
<div class="productos">
  <?php
  $sql = "SELECT * FROM Products";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<div class='item'>";
          echo "<img src='media/img/placeholder.png' alt='".$row['Nombre']."' />";
          echo "<h3>".$row['Nombre']."</h3>";
          echo "<p>".$row['Descripción']."</p>";
          echo "<p><b>".$row['Precio']." €</b></p>";
          echo "<a href='producto.php?id=".$row['idProducts']."'>Ver más</a>";
          echo "</div>";
      }
  } else {
      echo "No hay productos disponibles.";
  }
  ?>
</div>

</body>
</html>
