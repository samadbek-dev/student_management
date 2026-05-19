<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';
$full_name=$_POST['full_name'];
$student_age=$_POST['student_age'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$class_id=$_POST['class_id'];
$sql = "INSERT INTO students (full_name, student_age, phone, adress, class_id)
VALUES (?, ?, ?, ?, ?)";
// SQL so'rovini tayyorlash
$data = $conn-> prepare($sql);
$data->execute([$full_name, $student_age, $phone, $address, $class_id]);
header("Location: index.php");
exit();
?>