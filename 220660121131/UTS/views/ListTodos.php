
<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>

<style>
<?php include "assets/css/style.css"?>
body{
    background-image: url("./././img/ferd.jpg");
    background-color: transparent black;
    background-size: cover;
}
</style>

<script>
    <?php include "assets/js/script.js"?>
</script>
<body>
    <h1>Todo List</h1>
    <ul>
        <?php if (!empty($todos)): ?>
            <?php foreach ($todos as $todo): ?>
                <li>
                    <?php
                        echo $todo['task'];
                        if (!$todo['is_completed']) {
                            echo ' <a href="?action=complete&id=' . $todo['id'] . '">Mark as completed</a>';
                        }
                        echo ' <a href="?action=delete&id=' . $todo['id'] . '">Delete</a>';
                    ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Belum ada tugas.</li>
        <?php endif; ?>
    </ul>
    <form method="POST" action="?action=add">
        <input type="text" name="task" placeholder="New Task">
        <button type="submit">Add</button>
    </form>
</body>
</html>
