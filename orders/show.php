<?php
session_start();
require '../config/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid order ID");
}


$sql = "SELECT *
        FROM students s
        LEFT JOIN orders o ON s.student_id = o.student_id
        WHERE o.id = ?";

$data = $conn->prepare($sql);
$data->execute([$id]);

$row = $data->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Order not found");
}

$sql1 = "SELECT ot.*, b.title
         FROM order_item ot
         JOIN books b ON ot.book_id = b.id
         WHERE ot.order_id = ?";

$data1 = $conn->prepare($sql1);
$data1->execute([$id]);

$row1 = $data1->fetchAll(PDO::FETCH_ASSOC);

$cnt = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .info p {
            margin: 8px 0;
            font-size: 15px;
            color: #555;
        }

        .info strong {
            color: #222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead {
            background-color: #007bff;
            color: white;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }

        table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            margin-right: 5px;
        }

        .delete {
            background: #dc3545;
        }

        .edit {
            background: #28a745;
        }

        .check {
            background: #007bff;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Order Details</h2>

    <div class="info">
        <p><strong>ID:</strong> <?= $row['id'] ?></p>
        <p><strong>Student Name:</strong> <?= $row['full_name'] ?></p>
        <p><strong>Notes:</strong> <?= $row['note'] ?></p>
        <p><strong>Taken Day:</strong> <?= $row['from_date'] ?></p>
        <p><strong>Deadline:</strong> <?= $row['deadline'] ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Book Title</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php foreach($row1 as $item): ?>

            <tr>

                <td><?= $cnt++ ?></td>

                <td><?= $item['title'] ?></td>

                <td>

                    <a href="../order_items/delete.php?id=<?= $item['id'] ?>"
                       class="btn delete"
                       onclick="return confirm('rostdan ham o\'chirmoqchimisiz?')">
                        o'chirish
                    </a>

                    <a href="../order_items/edit.php?id=<?= $item['id'] ?>"
                       class="btn edit">
                        edit
                    </a>

<?php if(empty($item['intake_date'])): ?>

    <a href="../order_items/tekshirish.php?id=<?= $item['id'] ?>&order_id=<?= $id ?>"
       class="btn check">
        tekshirish
    </a>

<?php else: ?>
<btn class = "edit">Tekshirilgan</btn>


<?php endif; ?>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

    <a class="back-btn" href="index.php">
        ← Back
    </a>

</div>

</body>
</html>