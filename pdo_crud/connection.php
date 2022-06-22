<?php

$servername = "localhost";
$username = "boonstation";
$userpass = "pg1234";
$db_name =  "pdo_crud_db";

try {
    $dbcon = new PDO("pgsql:host=$servername;dbname=$db_name", $username, $userpass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connect success";
} catch (PDOException $e) {
    echo "Fail to connect" . $e->getMessage();
}
