<?php
require_once 'core/Database.php';

// Inisialisasi koneksi database
$db = new Database();
$conn = $db->connect();

// Tambah task baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
    $stmt = $conn->prepare("INSERT INTO todos (task) VALUES (:task)");
    $stmt->bindParam(':task', $task);
    $stmt->execute();
}

// Hapus semua task
if (isset($_GET['action']) && $_GET['action'] === 'deleteAll') {
    $stmt = $conn->prepare("DELETE FROM todos");
    $stmt->execute();
    header('Location: index.php');
    exit();
}

// Hapus task tertentu
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM todos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: index.php');
    exit();
}

// Ambil semua task dari database
$stmt = $conn->prepare("SELECT * FROM todos ORDER BY id DESC");
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
            <button id="removeAllBtn" class="btn" onclick="window.location='?action=deleteAll';">Remove All</button>
        </div>
        
        <ul class="todoList" id="todoList">
            <?php foreach ($tasks as $task): ?>
                <li>
                    <p><?= htmlspecialchars($task['task']); ?></p>
                    <button class="btn deleteBtn" onclick="window.location='?delete=<?= $task['id']; ?>';">Remove</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
