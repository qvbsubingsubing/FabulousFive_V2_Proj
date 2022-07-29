<?php
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database_warehouse_db.php");

$stmt = $db->prepare("SELECT * FROM `in_storage` INNER JOIN `accounts` ON in_storage.sender_id = accounts.id ORDER BY in_storage.item_name ASC;");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$show = encrypt(json_encode($result));
$display = "";
foreach($show as $show){
    $display = $display.$show.",";
}
$display[strlen($display)-1] = "]";
echo "[".$display;
//echo json_encode($result);

function encrypt($sample_message){
    //sample message (well literally). ascii message, same as sample message, but in ascii form.
    $ascii_message = [];
    for($i = 0; $i < strlen($sample_message); $i++){
        $ascii_message[$i] = ord($sample_message[$i]);
    }
    //RSA-in TIME!
    $encrypt_array = array(11, 13, 17, 19, 23, 29, 191, 193, 197, 199);
    $prime_array = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
    $p_var = rand(0, count($encrypt_array) - 1);
    $q_var = rand(0, count($encrypt_array) - 1);
    while($q_var == $p_var){
        $q_var = rand(0, count($encrypt_array));
    }
    $n_var = $encrypt_array[$p_var] * $encrypt_array[$q_var];
    $l_var = ($encrypt_array[$p_var] - 1) * ($encrypt_array[$q_var] - 1);
    $e_var = $prime_array[rand(0, count($prime_array) - 1)];
    while((int)($n_var % $e_var) == 0 || (int)($l_var % $e_var) == 0){
        $e_var = $prime_array[rand(0, count($prime_array) - 1)];
    }
    $public_key = 0;
    while((($public_key * $e_var) % $l_var) != 1){
        $public_key += 1;
    }
    //echo "P: ".$encrypt_array[$p_var]." | Q: ".$encrypt_array[$q_var]." | N: ".strval($n_var)." | L: ".strval($l_var)." | E: ".strval($e_var)." | D: ".strval($public_key);
    //ENCRYPTING
    $encrypted_message = [];
    for($i = 0; $i < count($ascii_message); $i++){
        $encrypted_message[$i] = powerMod($ascii_message[$i], $e_var, $n_var);
    }
    $encrypted_message[count($encrypted_message)] = $public_key;
    $encrypted_message[count($encrypted_message)] = $n_var;
    return $encrypted_message;
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