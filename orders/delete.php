<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];
$sql1 = "DELETE FROM order_item WHERE order_id = ?";
$data=$conn->prepare($sql1);
$data->execute([$id]);

$sql2 = "DELETE FROM orders WHERE id = ?";
$data1=$conn->prepare($sql2);
$data1->execute([$id]);

header("Location: index.php");
exit();
?>