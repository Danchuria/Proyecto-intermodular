<?php
function miFuncionInsertar() {

try{
$stmt = $pdo->prepare("INSERT INTO Products idProducts VALUES 1");
$stmt->execute(['nombre' => $nombre]);
return ['success' => true, 'id' => $pdo->LastInsertId()];
}catch (Exception $e) {
return ['success' => false, 'message' => $e->getMessage()];
}
}
