<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$experience = $_POST['experience'];
$sql = "INSERT INTO teachers (first_name, last_name, age, phone, subject, experience)
values (?, ?, ?, ?, ?, ?)";
$data = $conn-> prepare($sql);
$data->execute([$first_name, $last_name, $age, $phone, $subject, $experience]);
header("Location: index.php");
exit();
?>
