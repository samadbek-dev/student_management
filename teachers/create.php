<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Add Teacher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            padding: 25px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input:focus {
            border-color: #28a745;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Teacher</h2>

    <form action="store.php" method="POST">

        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name" placeholder="Enter first name" required>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name" placeholder="Enter last name" required>
        </div>
        <div class="form-group">
            <label>age</label>
            <input type="number" name="age" placeholder="Enter age" required>
        </div>

        <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject" placeholder="Enter subject" required>
        </div>

        <div class="form-group">
            <label>Experience (years)</label>
            <input type="number" name="experience" placeholder="Enter experience" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="+998..." required>
        </div>

        <div class="form-group">
            <label>Created At</label>
            <input type="datetime-local" name="created_at" required>
        </div>

        <div class="form-group">
            <label>Updated At</label>
            <input type="datetime-local" name="updated_at" required>
        </div>

        <button type="submit">Save Teacher</button>
    </form>
</div>
<script>
    function go back() {
        window.location.href = "index.php";
    } 
</script>
</body>
</html>