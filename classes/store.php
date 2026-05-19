<?php
session_start();
require '../config/db.php';

if (isset($_POST['create'])) {
    $stmt = $conn->prepare("INSERT INTO classes (class_name, teacher_id) VALUES (?, ?)");
    $stmt->execute([$_POST['class_name'], $_POST['teacher_id']]);
}

if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE classes SET class_name=?, teacher_id=? WHERE id=?");
    $stmt->execute([$_POST['class_name'], $_POST['teacher_id'], $_POST['id']]);
}

header("Location: index.php");
exit();