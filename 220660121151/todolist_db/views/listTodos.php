<!-- views/listTodos.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list.com</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        li:last-child {
            border-bottom: none;
        }
        .btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .form-container {
            margin-top: 20px;
        }
        input[type="text"] {
            width: calc(100% - 80px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <ul>
            <?php foreach ($todos as $todo): ?>
                <li>
                    <?php echo $todo['task']; ?>
                    <?php if (!$todo['is_completed']): ?>
                        <a class="btn" href="?action=complete&id=<?php echo $todo['id']; ?>">Mark as completed</a>
                    <?php endif; ?>
                    <a class="btn btn-danger" href="?action=delete&id=<?php echo $todo['id']; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="form-container">
            <form method="POST" action="?action=add">
                <input type="text" name="task" placeholder="New Task" required>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>
</body>
</html>