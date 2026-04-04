<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .input-group input:focus {
            border-color: #4facfe;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            border: none;
            background: #4facfe;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #00c6ff;
        }

        .footer-text {
            margin-top: 10px;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <form action="login_process.php" method="POST">
        <div class="input-group">
            <label for="username">Login</label>
            <input type="text" id="username"  name="username" placeholder="Enter your login" required>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="login-btn">Sign In</button>
    </form>
 
    <?php 
    if(isset($_GET['error'])){
        echo '<p style="color:red;"> Login yoki parol xato!</p>';
    }
    ?>

    <div class="footer-text">
        © 2026 Your Website
    </div>
</div>

</body>
</html>