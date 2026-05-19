<?php
session_start();
require "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}
$id= $_GET['id'];
$sql = "SELECT * FROM teachers WHERE id = ?";
$data = $conn->prepare($sql);
$data->execute([$id]);
$teacher = $data->fetch();

if(!$teacher){
    echo "Teacher topilmadi!";
    exit();
}

?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Create Teacher</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit {
            background: #28a745;
            color: white;
        }

        .back {
            background: #6c757d;
            color: white;
            margin-top: 10px;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Teacher add</h2>

    <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $teacher['id'] ?>">
        <div class="form-group">
            <label>First name</label>
            <input type="text" name="first_name" value="<?= $teacher['full_name'] ?>" required>
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" name="last_name" value="<?= $teacher['last_name'] ?>" required>
        </div>
        <div class="form-group">
            <label>age</label>
            <input type="text" name="age" value="<?= $teacher['age'] ?>" required>
        </div>
        <div class="form-group">
            <label>subject</label>
            <input type="text" name="subject" value="<?= $teacher['subject'] ?>" required>
        </div>
        <div class="form-group">
            <label>experience</label>
            <input type="text" name="experience" value="<?= $teacher['experience'] ?>" required>
        </div>
        <div class="form-group">
            <label>phone</label>
            <input type="text" name="phone" value="<?= $teacher['phone'] ?>" required>
        </div>
        <div class="form-group">
            <label>created_at</label>
            <input type="text" name="created_at" value="<?= $teacher['created_at'] ?>" required>
        </div>
<div class="form-group">
            <label>Updated_at</label>
            <input type="text" name="updated_at" value="<?= $teacher['updated_at'] ?>" required>
        </div>
        <button type="submit" class="btn submit" >Saqlash</button>
    </form>

    <button class="btn back" onclick="goBack()">Orqaga</button>
</div>

<script>
function goBack() {
    window.location.href = "index.php";
}
</script>

</body>
</html>

