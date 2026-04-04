<?php
session_start();
include '../config/db.php';
$username = $_POST['username'];
$password = $_POST['password'];
//sql
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
//so'rovni tayyorlash\\
$data = $conn->prepare($sql);
$data->execute([$username, $password]);

$user = $data-> fetch();
if($user){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: ../dashboard.php");
    exit();
}
else {
    header("Location: login.php?error=1");
    exit();
}
?>