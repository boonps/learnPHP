<?php

$servername = "localhost";
$username = "root";
$userpass = "root";
$db_name =  "register_boon";

try {
    $dbcon = new PDO("mysql:host=$servername;dbname=$db_name", $username, $userpass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connect success";
} catch (PDOException $e) {
    echo "Fail to connect" . $e->getMessage();
}
