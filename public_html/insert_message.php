<?php
session_start();
$sender_id = $_SESSION["curr_account_id"];
$receiver_id = $_SESSION["curr_chat_account_id"];
$message_content = $_POST["message"];

// $servername = "localhost";
// $username = "id18580145_presenteddatabaseusername";
// $password = "^4v4<f]#Q)DU&{7R";
// $dbname = "id18580145_presenteddatabasename";

try {
  include ("database_warehouse_db.php");
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO customer_messages (sender_id, receiver_id, message_content)
  VALUES ($sender_id, $receiver_id, '$message_content')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>