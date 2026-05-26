<?php
session_start();
require "../config/db.php";


if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
$sql= "SELECT * FROM teachers ORDER BY id DESC";
$data=$conn -> prepare($sql);
$data->execute();
$teachers= $data->fetchALL();

$cnt = 1;
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Teachers List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #b2b63cc9;
            color: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e6ffe6;
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

        .a:hover {
            opacity: 0.8;
        }
        .navbar{
        width:100%;
        background:linear-gradient(135deg, #1e293b, #334155);
        padding:14px 40px;
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
    }

    .nav-container{
        display:flex;
        align-items:center;
        justify-content:space-between;
        max-width:1200px;
        margin:auto;
    }

    .logo{
        color:white;
        font-size:24px;
        font-weight:bold;
        letter-spacing:1px;
    }

    .nav-links{
        list-style:none;
        display:flex;
        gap:18px;
    }

    .nav-links li a{
        text-decoration:none;
        color:white;
        padding:10px 18px;
        border-radius:8px;
        transition:0.3s ease;
        font-size:15px;
        font-weight:500;
    }

    .nav-links li a:hover{
        background:#3b82f6;
        transform:translateY(-2px);
    }

    .nav-links li a.active{
        background:#2563eb;
    }
    </style>
</head>
<body>
<header class="navbar">
    <div class="nav-container">
        <div class="logo">Menu</div>

        <ul class="nav-links">
            <li><a href="../classes/index.php">Classes</a></li>
            <li><a href="../teachers/index.php">Teachers</a></li>
            <li><a href="../students/index.php">Students</a></li>
            <li><a href="../books/index.php">Books</a></li>
            <li><a href="../orders/index.php">Orders</a></li>
        </ul>
    </div>
</header>

<div class="container">
    <h2>Teachers List</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>age</th>
                <th>Subject</th>
                <th>Experience (years)</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Updated_at</th>
                <th> actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($teachers as $items): ?>
            <tr>
                <td><?= $cnt++ ?></td>
                <td><?= $items['first_name']; ?></td>
                <td> <?= $items['last_name'] ?></td>
                <td><?= $items['age']; ?></td>
                <td><?= $items['subject'] ?></td>
                <td><?= $items['experience'] ?></td>
                <td><?= $items['phone'] ?></td>
                <td><?= $items['created_at'] ?></td>
                <td><?= $items['updated_at'] ?></td>
                <td>
                <a href="show.php?id=<?= $items['id'] ?>" class="view"> Ko'rish</a>
                <a href="edit.php?id=<?= $items['id'] ?>" class ="edit" >tahrirlash</a>
                <a href="delete.php?id=<?= $items['id'] ?>" class="delete" onclick="return confirm('rostdan ham o\'chirmoqchimisiz?')" >o'chirish</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <td><a href="../dashboard.php" class="btn">Ortga</a></td>

</div>

</body>
</html>