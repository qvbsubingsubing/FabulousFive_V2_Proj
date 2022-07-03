<?php
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database_warehouse_db.php");

$stmt = $db->prepare("SELECT * FROM `accounts`");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

?>