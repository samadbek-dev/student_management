<?php
session_start();
require '../config/db.php';

$id = $_GET['id'];
$sql="SELECT * FROM order_item WHERE id=?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$row = $data->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Order item not found");
}
$sql2="SELECT * FROM books";
$bookQuery = $conn->query($sql2);
if (!$bookQuery) {
    die("Books query failed");
}

$books = $bookQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<style>
.form {
    width:300px;
    margin:50px auto;
    display:flex;
    flex-direction:column;
}

select {
    margin:10px 0;
    padding:10px;
}

button {
    padding:10px;
    background:#3498db;
    color:white;
    border:none;
    cursor:pointer;
}
</style>
</head>
<body>

<form method="POST" action="store.php" class="form">

    <h2>Edit Book</h2>

    <input type="hidden" name="id" value="<?= $row['id'] ?>">

<select name="book_id" required>
    <?php foreach ($books as $b): ?>
        <option
            value="<?= $b['id'] ?>"
            <?= $b['id'] == $row['book_id'] ? 'selected' : '' ?>
        >
            <?= $b['title'] ?>
        </option>
    <?php endforeach; ?>
</select>

    <button type="submit" name="update">
        Update Book
    </button>

</form>

</body>
</html>