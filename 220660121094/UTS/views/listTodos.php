<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
    <h1>Todo List</h1>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <span><?= htmlspecialchars($todo['task']); ?></span>
                <div>
                    <?php if (!$todo['is_completed']): ?>
                        <a href="?action=complete&id=<?= $todo['id']; ?>">Mark as completed</a>
                    <?php endif; ?>
                    <a href="?action=delete&id=<?= $todo['id']; ?>" style="background-color: #dc3545;">Delete</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="POST" action="?action=add">
        <input type="text" name="task" placeholder="New Task">
        <button type="submit">Add</button>
    </form>
</body>
</html>
