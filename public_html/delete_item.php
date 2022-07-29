<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
/*To Get All Items in the Table (list.php).*/
header('Content-Type: application/json');

include ("database_warehouse_db.php");

$stmt = $db->prepare("SELECT * FROM `in_storage` INNER JOIN `accounts` ON in_storage.sender_id = accounts.id");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$show = json_encode($result);
$finalresult = array_values(json_decode($show, true));
//echo $finalresult[0]["date_order"];

function dateDiffInDays($date1, $date2){
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400));
    }

$x = 0;
while ($x < count($finalresult) && $_SESSION["curr_account_id"] == 1){
    if(dateDiffInDays($finalresult[$x]["date_order"], date("Y-m-d")) > 14 && $finalresult[$x]["date_order"] != "1111-11-11" && $finalresult[$x]["client_confirm"] == 1 && $finalresult[$x]["admin_confirm"] == 1){
        echo $finalresult[$x]["item_name"]." | ".$finalresult[$x]["date_order"]." | ".dateDiffInDays($finalresult[$x]["date_order"], date("Y-m-d"))."\n";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
            // sql to delete a record
            $sql = "DELETE FROM in_storage WHERE item_id=$x";
          
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          
          $conn = null;
    }
    $x++;
}

?>