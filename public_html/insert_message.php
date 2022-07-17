<?php
session_start();
$sender_id = $_SESSION["curr_account_id"];
$receiver_id = $_POST["message_receiver"];
$message_content = decrypt($_POST["message"]);

// $servername = "localhost";
// $username = "id18580145_presenteddatabaseusername";
// $password = "^4v4<f]#Q)DU&{7R";
// $dbname = "id18580145_presenteddatabasename";
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