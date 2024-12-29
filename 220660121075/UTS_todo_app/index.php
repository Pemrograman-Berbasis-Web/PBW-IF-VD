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
        'action' => "aksi",
        'task' => 'tugas'
    ],
    'en' => [
        'title' => 'My To-Do List',
        'placeholder' => 'Add a new task...',
        'addButton' => 'Add Task',
        'languageLabel' => 'Language:',
        'action' => 'action',
        'task' => 'task'
    ]
];

//translations for the current language
$trans = $translations[$language];
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
  <title><?php echo $trans['title']; ?></title>
  <link rel="stylesheet" type="text/css" href="style.css" />
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
      <th>Task</th>
      <th>Status</th>
      <th>Action</th> <!-- Aligns with the column that contains action buttons -->
    </tr>
  </thead>
  <tbody>
    <?php
    require 'config.php';
    $fetchingtasks = mysqli_query($db, "SELECT * FROM `task` ORDER BY `task_id` ASC") or die(mysqli_error($db));
    $count = 1;
    while ($fetch = $fetchingtasks->fetch_array()) {
    ?>
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
            <a href="delete_task.php?task_id=<?php echo $fetch['task_id']; ?>" class="btn-remove">Delete</a>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  </div>
</body>

</html>
