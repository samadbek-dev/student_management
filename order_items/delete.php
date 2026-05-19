<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM order_item WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$order_item = $data->fetch();

$sql = "DELETE FROM order_item WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);

$data = $conn->prepare("UPDATE books SET quantity = quantity + 1  WHERE id = ?
");
$data->execute([$id]);

header("Location: ../orders/show.php?id=" . $order_item['order_id']);
exit();
?>