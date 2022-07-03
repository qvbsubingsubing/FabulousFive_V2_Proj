<?php
session_start();
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database_warehouse_db.php");

$stmt = $db->prepare('SELECT * FROM `customer_messages` WHERE (sender_id = '.$_SESSION["curr_account_id"].' OR sender_id = '.$_SESSION["curr_chat_account_id"].') AND (receiver_id = '.$_SESSION["curr_chat_account_id"].' OR receiver_id = '.$_SESSION["curr_account_id"].')');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

?>