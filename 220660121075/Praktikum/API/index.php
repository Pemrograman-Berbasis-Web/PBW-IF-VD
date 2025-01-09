<?php
session_start();
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'en';

if (isset($_GET['lang'])) {
    $language = $_GET['lang'];
    $_SESSION['language'] = $language;
}

$translations = [
    'id' => [
        'title' => 'Daftar Tugas Saya',
        'placeholder' => 'Tambahkan tugas baru...',
        'addButton' => 'Tambah Tugas',
        'languageLabel' => 'Bahasa:',
        'action' => "Aksi",
        'task' => 'Tugas',
        'status' => 'Status'
    ],
    'en' => [
        'title' => 'My To-Do List',
        'placeholder' => 'Add a new task...',
        'addButton' => 'Add Task',
        'languageLabel' => 'Language:',
        'action' => 'Action',
        'task' => 'Task',
        'status' => 'Status'
    ]
];

$trans = $translations[$language];

// Ambil data tugas melalui API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/todo_app/api.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$tasks = $result['status'] == "success" ? $result['data'] : [];
$count = 1;
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <title><?php echo $trans['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script>
        // penghapusan data melalui api
        function deleteTask(taskId) {
            if (confirm('Are you sure you want to delete this task?')) {
                fetch('api.php', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ task_id: taskId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Task deleted successfully');
                        location.reload();
                    } else {
                        alert('Failed to delete task');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>
</head>

<body>
    <nav>
        <a class="heading" href="#"><?php echo $trans['title']; ?></a>
    </nav>

    <div class="container">
        <!-- Language Selector -->
        <label for="language-select" id="language-label"><?php echo $trans['languageLabel']; ?></label>
        <select id="language-select" onchange="location = '?lang=' + this.value;">
            <option value="id" <?php echo $language == 'id' ? 'selected' : ''; ?>>Bahasa Indonesia</option>
            <option value="en" <?php echo $language == 'en' ? 'selected' : ''; ?>>English</option>
        </select>

        <div class="input-area">
            <form method="POST" action="add_task.php">
                <input type="text" name="task" placeholder="<?php echo $trans['placeholder']; ?>" required />
                <button class="btn" name="add"><?php echo $trans['addButton']; ?></button>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $trans['task']; ?></th>
                    <th><?php echo $trans['status']; ?></th>
                    <th><?php echo $trans['action']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $fetch) { ?>
                <tr class="border-bottom">
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $fetch['task']; ?></td>
                    <td class="<?php echo strtolower($fetch['status']); ?>">
                        <?php echo $fetch['status']; ?>
                    </td>
                    <td class="action">
                        <?php
                        if ($fetch['status'] != "Done") {
                            echo '<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn-completed">Mark as Done</a>';
                        }
                        ?>
                        
                        <button onclick="deleteTask(<?php echo $fetch['task_id']; ?>)" class="btn-remove">Delete</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
