<?php
session_start();
/*To Get All Items in the Table (list.php).*/
//header('Content-Type: application/json');
$firstname_input = $_POST["firstname_input"];
$lastname_input = $_POST["lastname_input"];
$email_input = $_POST["email_input"];
$password_input = $_POST["password_input"];
$confirm_password_input = $_POST["confirm_password_input"];
$gender_input = $_POST["gender_input"];
$contact_number_input = $_POST["contact_number_input"];
$address_input = $_POST["address_input"];
$final_password_input = "";
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
        $servername = "localhost";
        $username = "id18580145_presenteddatabaseusername";
        $password = "^4v4<f]#Q)DU&{7R";
        $dbname = "id18580145_presenteddatabasename";
        
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
    echo "Sorry your password and confirm password inputs are different";
}
?>