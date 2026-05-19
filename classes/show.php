<?php
session_start();
require '../config/db.php';

$id = $_GET['id'];
$sql= "SELECT *
FROM teachers t
JOIN classes c ON t.id = c.teacher_id
WHERE c.id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$row = $data->fetch();
$sql1= "SELECT * FROM students WHERE class_id = ?";
$data1= $conn->prepare($sql1);
$data1->execute([$id]);
$row1 = $data1->fetchAll();
$cnt = 1;

?>

<!DOCTYPE html>
<html>
<body>

<h2>Details</h2>
<p>ID: <?= $row['id'] ?></p>
<p>Class name: <?= $row['class_name'] ?></p>
<p>Teacher name: <?= $row['first_name'] ?></p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($row1 as $item): ?>
        <tr>
            <td><?= $cnt++
            ?></td>
            <td><?= $item['full_name'] ?></td>
            <td><?= $item['student_age'] ?></td>
        </tr>
            <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back</a>

</body>
</html>