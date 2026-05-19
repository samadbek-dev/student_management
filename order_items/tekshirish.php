<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];
$order_id = $_GET['order_id'];

$intake_date = date('Y-m-d');

$sql = "UPDATE order_item 
        SET intake_date = ?
        WHERE id = ?";

$data = $conn->prepare($sql);
$data->execute([$intake_date, $id]);

header("Location: ../orders/show.php?id=" . $order_id);
exit;
?>