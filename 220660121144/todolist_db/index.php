<?php
// Start the session
session_start();

// Initialize the todos array if it's not set
if (!isset($_SESSION['todos'])) {
    $_SESSION['todos'] = [];
}

// Add a task to the list
if (isset($_POST['task']) && !empty($_POST['task'])) {
    $_SESSION['todos'][] = ['task' => $_POST['task'], 'done' => false];
}

// Mark a task as done
if (isset($_GET['done']) && isset($_SESSION['todos'][$_GET['done']])) {
    $_SESSION['todos'][$_GET['done']]['done'] = true;
}

// Delete a task
if (isset($_GET['delete']) && isset($_SESSION['todos'][$_GET['delete']])) {
    unset($_SESSION['todos'][$_GET['delete']]);
    $_SESSION['todos'] = array_values($_SESSION['todos']); // Re-index array after deletion
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern To-Do List</title>
  <link rel="stylesheet" href="assets/css/style.css">
</html>
<div class="todo-container">
    <h2>To-Do List</h2>

    <!-- Form to add new task -->
    <form action="index.php" method="post">
        <input type="text" name="task" id="task" class="input-task" placeholder="Enter your task here" required>
        <button type="submit" class="submit-btn">Add Task</button>
    </form>

    <!-- Task list -->
    <ul class="todo-list">
        <?php foreach ($_SESSION['todos'] as $index => $todo): ?>
            <li class="todo-item <?php echo $todo['done'] ? 'done' : ''; ?>" id="task-<?php echo $index; ?>">
                <span><?php echo htmlspecialchars($todo['task']); ?></span>
                <div class="task-actions">
                    <a href="?done=<?php echo $index; ?>" class="done-button <?php echo $todo['done'] ? 'disabled' : ''; ?>">Done</a>
                    <a href="?delete=<?php echo $index; ?>" class="delete-button">Delete</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="script.js"></script>
</body>
</html>
