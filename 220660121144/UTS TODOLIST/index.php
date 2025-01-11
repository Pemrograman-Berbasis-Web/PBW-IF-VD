<<<<<<< HEAD
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
=======

<?php
include 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $umur = $_POST['npm'];

    $sql = "INSERT INTO mahasiswa (nama, nim, umur) VALUES ('$nama', '$nim', $umur)";
    if ($conn->query($sql) === TRUE) {
        $success = "Data berhasil ditambahkan!";
    } else {
        $error = "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM mahasiswa");
>>>>>>> main
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>To-Do List with PHP, JavaScript, and CSS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

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
=======
    <title>Data Mahasiswa Program Studi Informatika FTI</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Profil Pembuat -->
    <div class="profile">
        <img src="assets/Abdah Syakiroh Gustian.jpg" alt="Foto Pembuat" class="profile-pic">
        <h2>Pembuat: Abdah Syakiroh Gustian</h2>
        <p>NIM: 220660121144</p>
        <p>Kelas: IF - VD</p>
    </div>

    <h2>Data Mahasiswa</h2>

    <?php if (isset($success)): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="" method="POST" class="form-input">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" required>

        <label for="umur">Umur:</label>
        <input type="number" name="umur" required>

        <button type="submit">Tambah</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['umur']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script src="js/script.js"></script>
</body>
</html>
>>>>>>> main
