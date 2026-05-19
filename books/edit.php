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
    <title>Edit Book</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit {
            background: #28a745;
            color: white;
        }

        .back {
            background: #6c757d;
            color: white;
            margin-top: 10px;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Kitobni tahrirlash</h2>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $book['id'] ?>">

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?= $book['title'] ?>" required>
        </div>

        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" value="<?= $book['author'] ?>" required>
        </div>

        <div class="form-group">
            <label>Published Date</label>
            <input type="date" name="published_date" value="<?= $book['published_date'] ?>">
        </div>

        <div class="form-group">
            <label>Book Note</label>
            <textarea name="book_note"><?= $book['book_note'] ?></textarea>
        </div>

        <button type="submit" class="btn submit" onclick="goBack()">Saqlash</button>
    </form>

    <button class="btn back" onclick="goBack()">Orqaga</button>
</div>

<script>
function goBack() {
    window.location.href = "index.php";
}
</script>

</body>
</html>