<?php
error_reporting(E_ERROR | E_PARSE); // get rid of this line of code if you want to check warnings.
session_start();
/*To Get All Items in the Table (list.php).*/
//header('Content-Type: application/json');
$firstname_input = decrypt($_POST["firstname_input"]);
$lastname_input = decrypt($_POST["lastname_input"]);
$email_input = decrypt($_POST["email_input"]);
$password_input = decrypt($_POST["password_input"]);
$confirm_password_input = decrypt($_POST["confirm_password_input"]);
$gender_input = decrypt($_POST["gender_input"]);
$contact_number_input = decrypt($_POST["contact_number_input"]);
$address_input = decrypt($_POST["address_input"]);
$final_password_input = "";
if(is_numeric($contact_number_input) != 1){
    echo "Contact number error!";
}else{
    if($gender_input == ""){
        echo "Please input your gender...";
    }else{
        if($password_input == $confirm_password_input){
            //echo "CORRECT PASSWORD AND CONFIRM PASSWORD";
            $final_password_input = md5($confirm_password_input);
            include ("database_warehouse_db.php");
            $stmt = $db->prepare("SELECT * FROM accounts WHERE email = '$email_input';");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $email_input_check = '"'.$email_input.'"';
            if($email_input_check == json_encode($result['email'])){
                echo "Sorry the email is already taken";
            }
            else if($firstname_input != "" && $lastname_input != "" && $email_input != "" && $final_password_input != "" && $contact_number_input != "" && $address_input != ""){
                // $servername = "localhost";
                // $username = "id18580145_presenteddatabaseusername";
                // $password = "^4v4<f]#Q)DU&{7R";
                // $dbname = "id18580145_presenteddatabasename";
                include ("database_warehouse_db.php");
                try {
                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  // set the PDO error mode to exception
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = "INSERT INTO accounts (firstname, lastname, email, password, gender, contactnumber, address) VALUES ('$firstname_input', '$lastname_input', '$email_input', '$final_password_input', '$gender_input', '$contact_number_input', '$address_input');";
                  // use exec() because no results are returned
                  $conn->exec($sql);
                  echo "NEW ACCOUNT CREATED SUCCESSFULLY!";
                } catch(PDOException $e) {
                  echo $sql . "<br>" . $e->getMessage();
                }
                
                $conn = null;
            }else{
                echo "Sorry, we can't accept missing inputs.";
            }
        } else{
            echo "PASSWORD MISMATCH";
        }
    }
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