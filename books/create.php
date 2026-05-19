<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
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

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input:focus, textarea:focus {
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
    <h2>Add Book</h2>

    <form action="store.php" method="POST">

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" placeholder="Enter book title" required>
        </div>

        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" placeholder="Enter author name" required>
        </div>

        <div class="form-group">
            <label>Published Date</label>
            <input type="date" name="published_date">
        </div>

        <div class="form-group">
            <label>Book Note</label>
            <textarea name="book_note" placeholder="Write something about the book"></textarea>
        </div>

        <!-- Optional: you can REMOVE these and set automatically in backend -->
        <div class="form-group">
            <label>Created At</label>
            <input type="datetime-local" name="created_at">
        </div>

        <div class="form-group">
            <label>Updated At</label>
            <input type="datetime-local" name="updated_at">
        </div>

        <button type="submit">Save Book</button>
    </form>
</div>

</body>
</html>