<?php
session_start();
$user = $_SESSION["curr_account_id"];
$target = $_POST["confirm_target"];
if($user == 1){
    // $servername = "localhost";
    // $username = "id18580145_presenteddatabaseusername";
    // $password = "^4v4<f]#Q)DU&{7R";
    // $dbname = "id18580145_presenteddatabasename";
    
    try {
      include ("database_warehouse_db.php");
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $sql = "UPDATE `in_storage` SET `admin_confirm` = '1' WHERE `in_storage`.`item_id` = '$target';";
    
      // Prepare statement
      $stmt = $conn->prepare($sql);
    
      // execute the query
      $stmt->execute();
    
      // echo a message to say the UPDATE succeeded
      echo "CONFIRMED BY ADMIN";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
} else{
    // $servername = "localhost";
    // $username = "id18580145_presenteddatabaseusername";
    // $password = "^4v4<f]#Q)DU&{7R";
    // $dbname = "id18580145_presenteddatabasename";
    
    try {
      include ("database_warehouse_db.php");
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $sql = "UPDATE `in_storage` SET `client_confirm` = '1' WHERE `in_storage`.`item_id` = '$target';";
    
      // Prepare statement
      $stmt = $conn->prepare($sql);
    
      // execute the query
      $stmt->execute();
    
      // echo a message to say the UPDATE succeeded
      echo "CONFIRMED BY CLIENT";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
}
$conn = null;
?>