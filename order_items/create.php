<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$order_id = $_GET['order_id'] ?? null;

if (!$order_id) {
    die("Order ID topilmadi");
}
$sql = "SELECT * FROM books";
$stmt = $conn->prepare($sql);
$stmt->execute();
$books = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];

    $sql = "INSERT INTO order_item (order_id, book_id)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$order_id, $book_id]);

    $data = $conn->prepare("UPDATE books 
                            SET quantity = quantity - 1 
                            WHERE id = ?");
    $data->execute([$book_id]);
}
?>
<h2>Kitob qo‘shish (Order #<?= $order_id ?>)</h2>

<form method="POST">
    <label>Kitob tanlang:</label>
    <select name="book_id" required>
        <option value="">-- Tanlang --</option>
        <?php foreach ($books as $book):?>
            <?php if(($book['quantity'])>0): ?>

            <option value="<?= $book['id'] ?>">
                <?= $book['title'] ?>
            </option>
                <?php else: ?>

        <?php endif; ?>
        <?php endforeach; ?>


    </select>

    <br><br>
    <button type="submit">Qo‘shish</button>
    <a href="../orders/index.php">ortga</a>
</form>