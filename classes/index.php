<?php
session_start();
require "../config/db.php";


if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
$sql= "SELECT *
FROM teachers t
JOIN classes c ON t.id = c.teacher_id;";
$data=$conn -> prepare($sql);
$data->execute();
$classes= $data->fetchALL();

$cnt = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Classes</title>
    <style>
        body { font-family: Arial; background:#f4f6f9; }
        .container { width:80%; margin:40px auto; }
        table { width:100%; border-collapse:collapse; background:#fff; }
        th, td { padding:12px; text-align:center; }
        th { background:#2c3e50; color:white; }
        tr:nth-child(even){ background:#f2f2f2; }
        .btn { padding:6px 10px; color:white; border-radius:5px; text-decoration:none; }
        .add { background:#3498db; }
        .edit { background:#f39c12; }
        .delete { background:#e74c3c; }
        .show { background: #4DF527; }

    </style>
</head>
<body>

<div class="container">
    <h1>Classes</h1>

    <a href="create.php" class="btn add">+ Add</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Class_name</th>
            <th>Teacher ID</th>
            <th>Actions</th>
        </tr>        

        <?php foreach ($classes as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['class_name'] ?></td>
            <td><?= $row['first_name'] ?></td>
            <td>
                <a href="show.php?id=<?= $row['id'] ?>" class="btn show">Show</a>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn delete"
                   onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<td>
    <a href="../dashboard.php" class="btn">Ortga</a></td>

</body>
</html>