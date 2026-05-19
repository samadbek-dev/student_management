<?php
session_start();
require '../config/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM classes WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$teachers = $conn->query("SELECT * FROM teachers")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<style>
.form { width:300px; margin:50px auto; display:flex; flex-direction:column; }
input, select { margin:10px 0; padding:10px; }
button { padding:10px; background:#f39c12; color:white; border:none; }
</style>
</head>
<body>

<form method="POST" action="store.php" class="form">
    <h2>Edit Class</h2>

    <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="text" name="class_name" value="<?= $row['class_name'] ?>" required>


    <select name="teacher_id" required>
        <?php foreach ($teachers as $t): ?>
            <option value="<?= $t['id'] ?>", <?= $t['id']==$row['teacher_id'] ? "selected" : "" ?>><?= $t['first_name'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>