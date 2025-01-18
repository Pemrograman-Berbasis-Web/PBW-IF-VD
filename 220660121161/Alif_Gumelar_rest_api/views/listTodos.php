<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <style>
        <?php include "assets/css/style.css"; ?>
    </style>
    <script>
        <?php include "assets/js/script.js"; ?>
    </script>
    <!-- Menyertakan jQuery dari CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk memuat semua todo dari API
            function loadTodos() {
                $.get('api.php?action=list', function(data) {
                    var todoList = $('#todo-list');
                    todoList.empty();
                    data.forEach(function(todo) {
                        var li = $('<li>').text(todo.task);
                        if (!todo.is_completed) {
                            li.append(' <a href="#" class="complete" data-id="' + todo.id + '">Mark as completed</a>');
                        }
                        li.append(' <a href="#" class="delete" data-id="' + todo.id + '">Delete</a>');
                        todoList.append(li);
                    });
                });
            }

            // Add todo
            // Fungsi untuk menambahkan todo baru
            $('#add-form').submit(function(e) {
                e.preventDefault();
                var task = $('#task').val();
                $.post('api.php?action=add', JSON.stringify({task: task}), function() {
                    $('#task').val('');
                    loadTodos();
                });
            });

            // Complete todo
            // // Fungsi untuk menandai todo sebagai selesai
            $(document).on('click', '.complete', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'api.php?action=complete',
                    type: 'PUT',
                    data: JSON.stringify({id: id}),
                    success: loadTodos
                });
            });

            // Delete todo
            // Fungsi untuk menghapus todo
            $(document).on('click', '.delete', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'api.php?action=delete',
                    type: 'DELETE',
                    data: JSON.stringify({id: id}),
                    success: loadTodos
                });
            });

            // Initial load
            // Memuat todos pada inisialisasi awal
            loadTodos();
        });
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