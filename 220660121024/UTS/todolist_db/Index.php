<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task'])) {
        // Menambahkan task baru
        $newTask = htmlspecialchars($_POST['task']);
        $todoList[] = ['task' => $newTask, 'completed' => false];
    }
    
    if (isset($_POST['clearAll'])) {
        // Menghapus semua task
        $todoList = [];
    }
    
    if (isset($_POST['markCompleted'])) {
        // Menandai task sebagai selesai
        $taskIndex = $_POST['markCompleted'];
        $todoList[$taskIndex]['completed'] = true;
    }
    
    if (isset($_POST['delete'])) {
        // Menghapus task
        $taskIndex = $_POST['delete'];
        unset($todoList[$taskIndex]);
        $todoList = array_values($todoList); // Re-index array
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="todo-container">
        <h1>My Todo List</h1>
        <!-- Form untuk menambahkan task -->
        <form action="index.php" method="POST" class="add-todo">
            <input type="text" name="task" id="taskInput" placeholder="Add new task..." required>
            <button type="submit" id="addTaskBtn">Add</button>
        </form>

        <!-- Daftar Todo -->
        <ul id="todoList">
            <?php foreach ($todoList as $key => $todo): ?>
                <li class="<?= $todo['completed'] ? 'completed' : '' ?>">
                    <?= $todo['task'] ?>
                    <form action="index.php" method="POST" class="inline-form">
                        <button type="submit" name="markCompleted" value="<?= $key ?>" class="complete-btn">✔</button>
                    </form>
                    <form action="index.php" method="POST" class="inline-form">
                        <button type="submit" name="delete" value="<?= $key ?>" class="delete-btn">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Clear All Button -->
        <form action="index.php" method="POST">
            <button type="submit" name="clearAll" id="clearAllBtn">Clear All</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
