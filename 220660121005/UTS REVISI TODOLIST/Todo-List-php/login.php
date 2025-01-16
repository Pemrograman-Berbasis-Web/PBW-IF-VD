<?php

include "includes/config.php";
session_start();

// Jika sudah login, arahkan ke halaman todos.php
if (isset($_SESSION["user_email"])) {
    header("Location: todos.php");
    die();
}

if (isset($_POST["submit"])) {
    // Mendapatkan data dari form
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));  // Jangan gunakan MD5, lebih baik gunakan password_hash()

    // Mengecek apakah email valid
    if (emailIsValid($email)) {
        // Mengecek apakah kombinasi email dan password valid
        if (checkLoginDetails($email, $password)) {
            // Membuat session untuk user yang berhasil login
            $_SESSION["user_email"] = $email;
            header("Location: todos.php");
            die();
        } else {
            // Jika login gagal
            echo "<script>alert('Login details are invalid.');window.location.replace('index.php');</script>";
        }
    } else {
        // Jika email tidak ditemukan, lakukan registrasi
        $user_registration = createUser($email, $password);
        if ($user_registration) {
            // Membuat session setelah registrasi berhasil
            $_SESSION["user_email"] = $email;
            header("Location: todos.php");
            die();
        } else {
            // Menangani kegagalan registrasi
            echo "User registration failed. Please try again later.";
            die();
        }
    }
} else {
    // Jika form tidak disubmit, kembalikan ke halaman login
    header("Location: index.php");
    die();
}
