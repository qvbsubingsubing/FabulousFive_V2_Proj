<?php
    // $db_name = "id18580145_presenteddatabasename";
    // $db_server = "localhost";
    // $db_user = "id18580145_presenteddatabaseusername";
    // $db_pass = "^4v4<f]#Q)DU&{7R";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "warehouse_db";
    $db_name = "warehouse_db";
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db = new PDO("mysql:host={$db_server};dbname={$db_name};charset=utf8", $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>