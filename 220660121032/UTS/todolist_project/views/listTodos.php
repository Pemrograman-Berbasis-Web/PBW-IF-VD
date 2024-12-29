<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        <?php include "assets/css/style.css"; ?>
    </style>
    <script>
        <?php include "assets/js/script.js"; ?>
    </script>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>

        <!-- Filter dan Pencarian -->
        <div class="filter-container">
            <input type="text" id="search" placeholder="Search tasks...">
            <select id="filter">
                <option value="all">All Tasks</option>
                <option value="completed">Completed Tasks</option>
                <option value="pending">Pending Tasks</option>
            </select>
        </div>

        <!-- Daftar Todo -->
        <ul id="todoList">
            <?php foreach ($todos as $todo): ?>
                <li class="<?php echo $todo['is_completed'] ? 'completed' : ''; ?>">
                    <?php echo $todo['task']; ?>
                    <div>
                        <?php if (!$todo['is_completed']): ?>
                            <a href="?action=complete&id=<?php echo $todo['id']; ?>">Mark as completed</a>
                        <?php endif; ?>
                        <a href="?action=delete&id=<?php echo $todo['id']; ?>">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Form untuk menambahkan Todo -->
        <form method="POST" action="?action=add">
            <input type="text" name="task" placeholder="New Task" required>
            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>
