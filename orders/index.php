<?php
session_start();
require "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$sql = "SELECT 
            o.*, 
            s.full_name,
            GROUP_CONCAT(b.title SEPARATOR ', ') AS books
        FROM orders o
        LEFT JOIN students s ON o.student_id = s.`student_id`
        LEFT JOIN order_item oi ON o.id = oi.order_id
        LEFT JOIN books b ON oi.book_id = b.id
        GROUP BY o.id
        ORDER BY o.id DESC";

$data = $conn->prepare($sql);
$data->execute();
$orders = $data->fetchAll();

$cnt = 1;
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Orders List</title>
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
            background: #28a745;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .a {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            text-decoration: none;
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

        .btn-add {
            display: inline-block;
            margin-bottom: 15px;
            background: #007bff;
        }
        .kechikish {
    background-color: #ff0019 !important;
}
    </style>
</head>
<body>

<a href="create.php" class="a btn-add">Qo‘shish</a>

<h2>Orders List</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Student</th>
            <th>Note</th>
            <th>From Date</th>
            <th>Deadline</th>
            <th>Created At</th>
            <th>Actions</th>
            <th>Books</th>
        </tr>
    </thead>
<tbody>
<?php
$bugun= date('Y-m-d');
    foreach ($orders as $item): 
        $kechikish= (strtotime($item['deadline']) < strtotime($bugun));
        $tekshirish= $kechikish ? 'class="kechikish"' : '';
?>
    <tr <?= $tekshirish ?>>
        <td><?= $cnt++ ?></td>
        <td><?= htmlspecialchars($item['full_name'] ?? 'Nomaʼlum'); ?></td>
        <td><?= htmlspecialchars($item['note']); ?></td>
        <td><?= date("d.M.Y", strtotime($item['from_date'])); ?></td>
        <td><?= date("d.M.Y", strtotime($item['deadline'])); ?></td>
        <td><?= date("d.M.Y", strtotime($item['created_at'])); ?></td>
        <td>
            <a href="../order_items/create.php?order_id=<?= $item['id'] ?>" class="a view">Kitob qo‘shish</a>
            <a href="../orders/show.php?id=<?= $item['id']?>">ko'rish</a>
            <a href="../orders/delete.php?id=<?= $item['id']?>" onclick="return confirm('Oʻchirmoqchimisiz?')">o'chirish</a>
        </td>
        <td><?= htmlspecialchars($item['books'] ?? '—'); ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
                    <td><a href="../dashboard.php" class="btn">Ortga</a></td>

</body>
</html>