<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$sql = "SELECT * FROM books ORDER BY id DESC";
$data = $conn->prepare($sql);
$data->execute();
$books = $data->fetchAll();

$cnt = 1;
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Books List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            padding: 20px;
        }

        .container {
            max-width: 1700px;
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

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #28a745;
            color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e6ffe6;
        }

        .view { background: #17a2b8; color: white; padding: 5px 5px; text-decoration: none; border-radius: 4px; }
        .edit { background: #ffc107; color: black; padding: 5px 5px; text-decoration: none; border-radius: 4px; }
        .delete { background: #dc3545; color: white; padding: 5px 5px; text-decoration: none; border-radius: 4px; }

        a:hover {
            opacity: 0.8;}
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
    <h2>Books List</h2>

    <a href="create.php" class="add-btn">+ Add Book</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Date</th>
                <th>Note</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $item): ?>
            <tr>
                <td><?= $cnt++?></td>
                <td><?= $item['title'] ?></td>
                <td><?= $item['author'] ?></td>
                <td><?= $item['published_date'] ?></td>
                <td><?= $item['book_note'] ?></td>
                <td><?= $item['created_at'] ?></td>
                <td><?= $item['updated_at'] ?></td>
                <td style="min-width: 170px;">
                    <a href="show.php?id=<?= $item['id'] ?>" class="view">Ko'rish</a>
                    <a href="edit.php?id=<?= $item['id'] ?>" class="edit">Tahrirlash</a>
                    <a href="delete.php?id=<?= $item['id'] ?>" 
                       class="delete"
                       onclick="return confirm('Rostdan ham o‘chirmoqchimisiz?')">
                       O‘chirish
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                <td><a href="../dashboard.php" class="btn">Ortga</a></td>

</div>

</body>
</html>