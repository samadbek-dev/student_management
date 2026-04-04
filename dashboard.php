<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}
?>
<h2>Welcome, <?= $_SESSION['username']; ?>!</h2>
<a href="students/index.php">students</a>
<a href="auth/logout.php">Logout</a>