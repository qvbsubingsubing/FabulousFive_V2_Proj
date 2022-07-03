<?php
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database_warehouse_db.php");

$stmt = $db->prepare("SELECT * FROM `in_storage` INNER JOIN `accounts` ON in_storage.sender_id = accounts.id ORDER BY in_storage.date_order DESC;");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

?>