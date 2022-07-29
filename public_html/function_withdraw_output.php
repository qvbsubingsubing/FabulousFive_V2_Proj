<?php
error_reporting(E_ERROR | E_PARSE); // get rid of this line of code if you want to check warnings.
session_start();


$target_item = $_POST["withdraw_item_id"];
$target_person = $_POST["withdraw_target"];
$date_order = date("Y-m-d");
//echo $target_person;
if(is_numeric($target_person) == 1){
    //echo "is_numeric: ".is_numeric($target_person)." | ".$target_person;
    include ("database_warehouse_db.php");
    $stmt = $db->prepare("SELECT id FROM `accounts` WHERE contactnumber = $target_person");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $target_person = json_encode($result['id']);
    
}
else if($target_person == "me"){
    $target_person = $_SESSION["curr_account_id"];
    // echo "'";
} else {
  include ("database_warehouse_db.php");
  $stmt = $db->prepare("SELECT id FROM `accounts` WHERE email = '$target_person'");
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $target_person = json_encode($result['id']);
}

// $servername = "localhost";
// $username = "id18580145_presenteddatabaseusername";
// $password = "^4v4<f]#Q)DU&{7R";
// $dbname = "id18580145_presenteddatabasename";

//echo $target_person;
if($target_person != 'null'){
  include ("database_warehouse_db.php");
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "UPDATE `in_storage` SET in_storage.receiver_id = $target_person, in_storage.date_order = '$date_order' WHERE in_storage.item_id = $target_item;";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  // echo a message to say the UPDATE succeeded
  echo "WITHDRAW TRANSACTION CONFIRMED";
  
  
  $conn = null;
} else {
  echo "TRANSACTION CANCELLED";
}

?>