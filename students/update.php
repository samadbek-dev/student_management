<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id= $_POST['id'];
$full_name=$_POST['full_name'];
$student_age=(int)$_POST['student_age'];
$phone=$_POST['phone'];
$adress=$_POST['address'];
$class_id=$_POST['class_id'];
$sql= "UPDATE student;
    SET full_name = ?, student_age = ?, phone = ?, adress = ?, class_id = ;
    WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$full_name, $student_age, $phone, $adress, $class_id, $id]);
header("Location: index.php");
exit();
?>