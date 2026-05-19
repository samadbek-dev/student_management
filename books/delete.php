<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
$id=$_GET['id'];
//xavfsizlik uchun oldin  tekshiramiz
$sql="SELECT * FROM books WHERE id= ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$student = $data->fetch();

if(!$student){
    echo "Student topilmadi!";
    exit();
}
//o'chirish
$sql = "DELETE FROM  books WHERE id = ?";
$data = $conn->prepare($sql);
$data-> execute([$id]);

header("Location: index.php");
exit();

?>