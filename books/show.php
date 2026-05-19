<?php 
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM books WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$book = $data->fetch();

if(!$book){
    echo "Book topilmadi!";
    exit();
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Book Detail</title>
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
            display: block;
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
    <h2>Book Detail</h2>

    <div class="field">
        <span class="label">Title</span>
        <div class="value"><?= $book['title']; ?></div>
    </div>

    <div class="field">
        <span class="label">Author</span>
        <div class="value"><?= $book['author']; ?></div>
    </div>

    <div class="field">
        <span class="label">Published Date</span>
        <div class="value"><?= $book['published_date']; ?></div>
    </div>

    <div class="field">
        <span class="label">Note</span>
        <div class="value"><?= $book['book_note']; ?></div>
    </div>


    <div class="field">
        <span class="label">Created At</span>
        <div class="value"><?= $book['created_at']; ?></div>
    </div>

    <div class="field">
        <span class="label">Updated At</span>
        <div class="value"><?= $book['updated_at']; ?></div>
    </div>

</div>

</body>
</html>