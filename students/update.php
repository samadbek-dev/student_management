<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id= $_POST['id'];
$full_name=$_POST['full_name'];
$age=(int)$_POST['age'];
$phone=$_POST['phone'];
$adress=$_POST['address'];
$class_name=$_POST['class_name'];
$sql= "UPDATE members
    SET full_name = ?, age = ?, phone = ?, adress = ?, class_name = ?
    WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$full_name, $age, $phone, $adress, $class_name, $id]);
header("Location: index.php");
exit();
?>