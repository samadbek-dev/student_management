<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
$id=$_GET['id'];
$sql="SELECT * FROM teachers WHERE id=?";
$data= $conn->prepare($sql);
$data->execute([$id]);
$teacher= $data->fetch();
if(!$teacher){
    echo "ustoz topilmadi!";
    exit();
}
$sql= "DELETE * FROM teachers WHERE id=?";

$data=$conn->prepare($sql);
$data->execute([$id]);
header("Location: index.php");
exit();
?>