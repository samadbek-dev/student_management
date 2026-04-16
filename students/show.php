<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
$id= $_GET['id'];
$sql= "SELECT * FROM members WHERE id= ?";
$data = $conn->prepare($sql);
$data ->execute([$id]);
$student = $data->fetch();
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Member Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #ffffff;
            padding: 25px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .field {
            margin-bottom: 12px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            margin-top: 4px;
            padding: 8px;
            background: #f1f3f5;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Member Detail</h2>

    <div class="field">
    <span class ="label">Ism Familiya</span>
    <?= $student['full_name']; ?>
    </div>

    <div class="field">
    <span class ="label">Yoshi</span>
    <?= $student['age']; ?>
    </div>

    <div class="field">
    <span class ="label">sinifi</span>
    <?= $student['class_name']; ?>
    </div>

    <div class="field">
    <span class ="label">address</span>
    <?= $student['adress']; ?>
    </div>

    <div class="field">
    <span class ="label">yaratilgan:</span>
    <?= $student['created_at']; ?>
    </div>
</div>

</body>
</html>