<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
/*To Get All Items in the Table (list.php).*/
//header('Content-Type: application/json');
$email_input = $_POST["email_input"];
$password_input = $_POST["password_input"];
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

?>