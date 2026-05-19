<?php
session_start();
require '../config/db.php';

$students = $conn->query("SELECT student_id, full_name FROM students")->fetchAll();
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


    <select name="student_id" required>
        <option value="" >Select student</option>
        <?php foreach ($students as $s): ?>
            <option value="<?= $s['student_id'] ?>" ><?= $s['full_name'] ?></option>
        <?php endforeach; ?>
    </select>
        <input type="text" name="note" placeholder="notes" required>

            <div>
            <label>olib ketish kuni</label>
            <input type="date" name="from_date">
        </div>
            <div>
            <label>olib kelish kuni</label>
            <input type="date" name="deadline">
        </div>

    <button type="submit" name="create">Create</button>
</form>
   
</body>
</html>