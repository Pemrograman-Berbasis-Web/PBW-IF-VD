<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <style>
    /* Mengatur gaya untuk seluruh halaman */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f7f7f7;
    color: #333;
    line-height: 1.6;
}

/* Judul halaman */
h1 {
    text-align: center;
    color: #444;
}

/* Gaya untuk daftar todo */
#todo-list {
    list-style: none;
    padding: 0;
    margin: 20px auto;
    max-width: 400px;
}

/* Gaya untuk setiap item dalam daftar todo */
#todo-list li {
    background: #fff;
    margin-bottom: 10px;
    padding: 10px 15px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Gaya untuk tombol aksi */
#todo-list li a {
    text-decoration: none;
    color: #007BFF;
    font-size: 0.9em;
    margin-left: 10px;
}

#todo-list li a:hover {
    color: #0056b3;
}

/* Gaya untuk todo yang selesai */
#todo-list li.completed {
    text-decoration: line-through;
    color: #999;
}

/* Gaya untuk formulir input */
#add-form {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

/* Input teks */
#add-form input[type="text"] {
    width: 300px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px;
    outline: none;
}

/* Tombol tambah */
#add-form button {
    padding: 10px 15px;
    border: none;
    background-color: #007BFF;
    color: white;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
}

#add-form button:hover {
    background-color: #0056b3;
}

    </style>
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
    <h1>Todo List</h1>
    <ul id="todo-list"></ul> <!-- Daftar todo ditampilkan di sini -->
    <form id="add-form">
        <input type="text" id="task" placeholder="New Task"> <!-- Input untuk menambah todo -->
        <button type="submit">Add</button> <!-- Tombol untuk mengirim form -->
    </form>
</body>
</html>