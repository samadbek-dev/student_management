<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';
$full_name=$_POST['full_name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$class_name=$_POST['class_name'];
$sql = "INSERT INTO members (full_name, age, phone, adress, class_name)
VALUES (?, ?, ?, ?, ?)";
// SQL so'rovini tayyorlash
$data = $conn-> prepare($sql);
$data->execute([$full_name, $age, $phone, $address, $class_name]);
header("Location: index.php");
exit();
?>