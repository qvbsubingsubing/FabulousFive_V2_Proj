<?php
session_start();
$item_name = $_POST["item_name"];
$quantity = $_POST["quantity"];
$fragility = $_POST["fragility"];
$date_of_input = $_POST["date_of_input"];
$sender_id = $_SESSION["curr_account_id"];
if($date_of_input == ""){
    $date_of_input = "0000-00-00";
}
$date_in = date("Y-m-d");
if(is_numeric($quantity) != ""){
    //echo "item name: ".$item_name." | quantity: ".$quantity." | fragility: ".$fragility." | date_of_input: ".$date_of_input;
    // $servername = "localhost";
    // $username = "id18580145_presenteddatabaseusername";
    // $password = "^4v4<f]#Q)DU&{7R";
    // $dbname = "id18580145_presenteddatabasename";
    include ("database_warehouse_db.php");
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO in_storage (item_name, sender_id, receiver_id, fragility, quantity, expiration, date_in, date_order, date_out, admin_confirm, client_confirm) VALUES ('$item_name', $sender_id, 1, '$fragility', '$quantity', '$date_of_input', '$date_in', '0000-00-00', '0000-00-00', '0', '0');";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo $sql;
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
} else{
    echo "Sorry, we can't accept invalid inputs";
}

?>