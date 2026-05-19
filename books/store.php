<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

require '../config/db.php';

// Get form data
$title = $_POST['title'];
$author = $_POST['author'];
$published_date = $_POST['published_date'];
$book_note = $_POST['book_note'];

// Insert into database
$sql = "INSERT INTO books (title, author, published_date, book_note, created_at, updated_at)
        VALUES (?, ?, ?, ?, NOW(), NOW())";

$data = $conn->prepare($sql);
$data->execute([$title, $author, $published_date, $book_note]);

header("Location: index.php");
exit();
?>