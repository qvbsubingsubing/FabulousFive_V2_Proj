<?php
session_start();
$item_name = decrypt($_POST["item_name"]);
$quantity = decrypt($_POST["quantity"]);
$fragility = decrypt($_POST["fragility"]);
$date_of_input = decrypt($_POST["date_of_input"]);
$sender_id = $_SESSION["curr_account_id"];
//RSA***

function decrypt($sample_encrypted_message){
  //DECRYPTING
  $raw_decrypted_message = [];
  $decrypted_message = "";
  for($i = 0; $i < count($sample_encrypted_message) - 2; $i++){
      $raw_decrypted_message[$i] = powerMod($sample_encrypted_message[$i], $sample_encrypted_message[count($sample_encrypted_message)-2], $sample_encrypted_message[count($sample_encrypted_message)-1]);
  }
  for($i = 0; $i < count($raw_decrypted_message); $i++){
      $decrypted_message = $decrypted_message.chr($raw_decrypted_message[$i]);
  }
  return $decrypted_message;
}
function powerMod($base, $exponent, $modulus) {
  if ($modulus === 1) return 0;
  $result = 1;
  $base = $base % $modulus;
  while ($exponent > 0) {
      if ($exponent % 2 === 1)  //odd number
          $result = ($result * $base) % $modulus;
      $exponent = $exponent >> 1; //divide by 2
      $base = ($base * $base) % $modulus;
  }
  return $result;
}

//RSA***
if($date_of_input == ""){
    $date_of_input = "1111-11-11";
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
      $sql = "INSERT INTO in_storage (item_name, sender_id, receiver_id, fragility, quantity, expiration, date_in, date_order, admin_confirm, client_confirm) VALUES ('$item_name', $sender_id, 1, '$fragility', '$quantity', '$date_of_input', '$date_in', '1111-11-11', '0', '0');";
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