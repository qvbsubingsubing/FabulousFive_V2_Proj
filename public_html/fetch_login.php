<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
/*To Get All Items in the Table (list.php).*/
//header('Content-Type: application/json');
$email_input = decrypt($_POST["email_input"]);
$password_input = decrypt($_POST["password_input"]);
$password_input = md5($password_input);
//echo $email_input.' | '.$password_input;
include ("database_warehouse_db.php");
$stmt = $db->prepare("SELECT * FROM accounts WHERE email = '$email_input' AND password = '$password_input';");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION["curr_email"] = json_encode($result['email']); //permanent account property
$_SESSION["curr_account_id"] = json_encode($result['id']); //permanent account property during use
$_SESSION["curr_chat_account_id"] = json_encode($result['id']); //changeable by clicking who will be chatted
$_SESSION["selected_item"] = "0"; //changeable by clicking the selected item
$email_input = '"'.$email_input.'"';
$password_input = '"'.$password_input.'"';
//echo $_SESSION['curr_account_id'].'  |  '.$email_input;

if($email_input == json_encode($result['email']) && $password_input == json_encode($result['password'])){
    echo "LOGIN SUCCESSFUL";
} else{
    echo "LOGIN FAILED";
}

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
?>