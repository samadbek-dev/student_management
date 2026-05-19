<?php
require '../config/db.php';

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $book_id = $_POST['book_id'];

    $data = $conn->prepare("UPDATE order_item SET book_id=? WHERE id=?");
    $data->execute([$book_id, $id]);
    $data = $conn->prepare("UPDATE books SET quantity=quantity-1 WHERE id=book_id");


    header("Location: ../orders/index.php");
    exit;
}
?>