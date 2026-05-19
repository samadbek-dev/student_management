<?php
session_start();
require '../config/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM classes WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
exit();