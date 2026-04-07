<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
//sql yozish
$sql = "SELECT * FROM members ORDER BY id DESC";
$data = $conn->prepare($sql);
$data->execute();
$students = $data->fetchALL();
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .btn {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }

        .view {
            background: #17a2b8;
        }

        .edit {
            background: #ffc107;
            color: black;
        }

        .delete {
            background: #dc3545;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
                <a href="create.php" class="btn view">Qo‘shish</a>

<h2>Students List</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Age</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($students as $item): ?>
        <tr>
            <td><?= $item['id'];?></td>
            <td><?= $item['full_name'];?></td>
            <td><?= $item['age'];?></td>
            <td><?= $item['class_name'];?></td>
            <td><?= $item['phone'];?></td>
            <td><?= $item['adress'];?></td>
            <td><?= date("d.M.Y", strtotime($item['created_at']));?></td>
            <td>
                <button class="btn view">Ko‘rish</button>
                <button class="btn edit">Tahrirlash</button>
                <button class="btn delete">O‘chirish</button>
            </td>
        </tr>
            <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>