<?php
include "config.php";

// $sql = "INSERT INTO user (name, email, date) VALUES (:name, :email, :date)";
// $query = $dbcon->prepare($sql);
// $query->bindParam(':name', $name, PDO::PARAM_STR);
// $query->bindParam(':email', $email, PDO::PARAM_STR);
// $query->bindParam(':date', $date, PDO::PARAM_STR);

// $name = "PASUSASSSS";
// $email = "PASUARSA@gmail.com";
// $date = Date('Y-m-d');

// $result = $query->execute();
// if ($result) {
//     echo "<script>alert('Sucess')</script>";
// } else {
//     echo "<script>alert('Fail')</script>";
// }

// $sql = "SELECT * FROM user WHERE email = :email";
// $query = $dbcon->prepare($sql);
// $query->bindParam(':email', $email, PDO::PARAM_STR);
// $email = "PASUARSA@gmail.com";
// $query->execute();
// $result = $query->fetchAll(PDO::FETCH_OBJ);
// if ($query->rowCount() > 0) {
//     foreach ($result as $res) {
//         // echo $res->name . "<br>";
//         echo $res->email . "<br>";
//         // echo $res->date . "<br>";
//     }
// }

// $sql = "UPDATE user SET name = :name, email = :email WHERE id = :id";
// $query = $dbcon->prepare($sql);
// $query->bindParam(':name', $name, PDO::PARAM_STR);
// $query->bindParam(':email', $email, PDO::PARAM_STR);
// $query->bindParam(':id', $id, PDO::PARAM_STR);

// $name = "BooTstation";
// $email = "boonstatdion@gmail.com";
// $id = 10;

// $query->execute();
// if ($query->rowCount() > 0) {
//     echo "<script>alert('Updated')</script>";
// } else {
//     echo "<script>alert('Fail')</script>";
// }

$sql = "DELETE FROM user WHERE id = :id";
$query = $dbcon->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$id = 10;
$query->execute();
if ($query->rowCount() > 0) {
    echo "<script>alert('Deleted')</script>";
} else {
    echo "<script>alert('Fail')</script>";
}
