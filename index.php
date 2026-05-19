<?php include('config/db.php') ?>
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php");
    exit();
}
?>

