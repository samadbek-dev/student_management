<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .btn {
            text-decoration: none;
            padding: 15px 30px;
            background: #4facfe;
            color: white;
            border-radius: 8px;
            font-size: 18px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h1>

    <div class="buttons">
        <a href="students/index.php" class="btn">Students</a>
        <a href="teachers/index.php" class="btn">Teachers</a>
        <a href="classes/index.php" class="btn">Classes</a>
        <a href="books/index.php" class="btn">Books</a>
        <a href="orders/index.php" class="btn">Orders</a>

    </div>
</div>

</body>
</html>