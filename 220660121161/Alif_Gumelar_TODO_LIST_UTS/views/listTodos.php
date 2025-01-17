<!DOCTYPE html>
<html lang="en">
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="input-container">
            <h1>My ToDo List</h1>
            <form method="POST" action="index.php">
                <input type="text" name="task" placeholder="Add new task" required />
                <button type="submit">Add</button>
            </form>
        </div>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li><?= htmlspecialchars($task->task) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
