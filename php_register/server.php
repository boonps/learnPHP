<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "register_boon";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connect fail!!!" . mysqli_connect_error());
}
// else {
//     echo "Connected SucessFully";
// }
