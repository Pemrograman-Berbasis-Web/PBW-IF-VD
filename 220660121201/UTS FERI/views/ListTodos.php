<!-- views/listTodos.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <!--
        style.CSS
        Berfungsi untuk membuat tampilan lebih menarik
    -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--
        script.js
        Berfungsi untuk mengirimkan data ke server
        serta menampilkan alert jika data berhasil di input
    -->
    <Script> src="assets/js/script.js"></Script>

    <style>
        <?php include "assets/css/style.css" ?>
    </style>

    <script>
        <?php include "assets/js/script.js" ?>
    </script>
</head>
<body>
    <h1>Todo List</h1>
    <ul>
        <?php foreach ($todos as $todo): ?>
            <li>
                <?php
                    // Tampilkan deskripsi Todo
                    echo $todo['task'];

                    // Jika Todo belum selesai, tampilkan link untuk menandai sebagai selesai
                    if (!$todo['is_completed']) {
                        echo ' ';
                        echo '<a href="?action=complete&id=' . $todo['id'] . '">Mark as completed</a>';
                    }

                    // Tampilkan link untuk menghapus Todo
                    echo ' ';
                    echo '<a href="?action=delete&id=' . $todo['id'] . '">Delete</a>';
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="POST" action="?action=add">
        <input type="text" name="task" placeholder="New Task">
        <button type="submit">Add</button>
    </form>
</body>
</html>

<style>
    /* style.css */

/* Mengatur gaya umum halaman */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0;
    padding: 20px;
}

/* Gaya untuk judul */
h1 {
    font-size: 2em;
    color: #4CAF50;
    margin-bottom: 20px;
}

/* Mengatur gaya list Todo */
ul {
    list-style-type: none;
    padding: 0;
    width: 100%;
    max-width: 500px;
}

/* Gaya untuk setiap item Todo */
li {
    background-color: #fff;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Gaya untuk link "Mark as completed" dan "Delete" */
li a {
    color: #4CAF50;
    text-decoration: none;
    font-size: 0.9em;
    margin-left: 10px;
}

li a:hover {
    color: #388E3C;
    text-decoration: underline;
}

/* Mengatur form penambahan Todo */
form {
    display: flex;
    justify-content: center;
    width: 100%;
    max-width: 500px;
    margin-top: 20px;
}

input[type="text"] {
    flex: 1;
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ddd;
    border-radius: 5px 0 0 5px;
    outline: none;
}

button[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    font-size: 1em;
    border: none;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #388E3C;
}

 
</style>
