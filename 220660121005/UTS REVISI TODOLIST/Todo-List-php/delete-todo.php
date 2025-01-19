<?php

/* ====================================================== */
/* Database connection function */
/* ====================================================== */
function dbConnect()
{
    // Tentukan host, username, password, dan database
    $hostname = "localhost";  // Ganti dengan localhost atau localhost:3306 jika menggunakan port 3306
    $username = "root";       // Default username untuk XAMPP MySQL
    $password = "";           // Jika tidak ada kata sandi, biarkan kosong
    $database = "todo_list";  // Nama database yang digunakan

    // Membuat koneksi ke database MySQL
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // Cek apakah koneksi berhasil
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;  // Mengembalikan koneksi
}

/* ====================================================== */
/* Check email is valid or not function */
/* ====================================================== */
function emailIsValid($email)
{
    $conn = dbConnect(); // Gunakan koneksi database global
    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

/* ====================================================== */
/* Check login details is valid or not function */
/* ====================================================== */
function checkLoginDetails($email, $password)
{
    $conn = dbConnect();
    $sql = "SELECT password FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        return password_verify($password, $user['password']); // Menggunakan password_verify
    }
    return false;
}

/* ====================================================== */
/* Create user function (with password hashing) */
/* ====================================================== */
function createUser($email, $password)
{
    $conn = dbConnect();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Gunakan password_hash
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
    return mysqli_query($conn, $sql);
}

/* ====================================================== */
/* Get Head function */
/* ====================================================== */
function getHead()
{
    $pageTitle = dynamicTitle();  // Mendapatkan judul dinamis halaman
    $output = '<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <title>' . $pageTitle . ' - Todos-List-PHP</title>';

    echo $output;  // Menampilkan tag <head>
}

/* ====================================================== */
/* Get Header function */
/* ====================================================== */
function getHeader()
{
    $output = '<header class="py-3 mb-4 border-bottom bg-white">
        <div class="d-flex flex-wrap justify-content-around container">
            <a href="todos.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <div class="fs-4 mr-3">Todo List</div>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="todos.php" class="nav-link active ml-5" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="add-todo.php" class="nav-link bg-success mx-3 text-white">Add Todo</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link bg-danger text-white">Logout</a></li>
            </ul>
        </div>
    </header>';

    echo $output;  // Menampilkan header
}

/* ====================================================== */
/* Text Limit function */
/* ====================================================== */
function textLimit($string, $limit)
{
    return strlen($string) > $limit ? substr($string, 0, $limit) . "..." : $string;
}

/* ====================================================== */
/* Get Todo function */
/* ====================================================== */
function getTodo($todo)
{
    $output = '<div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">' . textLimit($todo['title'], 28) . '</h4>
            <p class="card-text">' . textLimit($todo['description'], 75) . '</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="view-todo.php?id=' . $todo['id'] . '" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="edit-todo.php?id=' . $todo['id'] . '" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                <small class="text-muted">' . $todo['date'] . '</small>
            </div>
        </div>
    </div>';

    echo $output;  // Menampilkan item Todo
}

/* ====================================================== */
/* Dynamic Title function */
/* ====================================================== */
function dynamicTitle()
{
    global $conn;
    $filename = basename($_SERVER["PHP_SELF"]);
    $pageTitle = "";

    switch ($filename) {
        case 'index.php':
            $pageTitle = "Home";
            break;
        case 'todos.php':
            $pageTitle = "Todo List";
            break;
        case 'add-todo.php':
            $pageTitle = "Add Todo";
            break;
        case 'edit-todo.php':
            $pageTitle = "Edit Todo";
            break;
        case 'view-todo.php':
            $todoId = mysqli_real_escape_string($conn, $_GET["id"]);
            $sql1 = "SELECT * FROM todos WHERE id='{$todoId}'";
            $res1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($res1) > 0) {
                foreach ($res1 as $todo) {
                    $pageTitle = $todo["title"];
                }
            }
            break;
        default:
            $pageTitle = "Todo List";
            break;
    }

    return $pageTitle;  // Mengembalikan judul halaman dinamis
}

?>
