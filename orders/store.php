<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';
$student_id=$_POST['student_id'];
$note=$_POST['note'];
$from_date=$_POST['from_date'];
$deadline=$_POST['deadline'];
$sql = "INSERT INTO orders (student_id, note, from_date, deadline)
        VALUES (?, ?, ?, ?)";
$data = $conn->prepare($sql);
$data->execute([$student_id, $note, $from_date, $deadline]);
$order_id = $conn->lastInsertId();



header("Location: ../order_items/create.php?order_id=" . $order_id);
exit();
?>