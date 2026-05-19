<?php
session_start();
require '../config/db.php';

$teachers = $conn->query("SELECT id, first_name FROM teachers")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<style>
.form { width:300px; margin:50px auto; display:flex; flex-direction:column; }
input, select { margin:10px 0; padding:10px; }
button { padding:10px; background:#2ecc71; color:white; border:none; }
</style>
</head>
<body>

<form method="POST" action="store.php" class="form">
    <h2>Add Class</h2>

    <input type="text" name="class_name" placeholder="Class_name" required>

    <select name="teacher_id" required>
        <option value="" >Select Teacher</option>
        <?php foreach ($teachers as $t): ?>
            <option value="<?= $t['id'] ?>" ><?= $t['first_name'] ?></option>
        <?php endforeach; ?>

    </select>

    <button type="submit" name="create">Create</button>
</form>
   
</body>
</html>