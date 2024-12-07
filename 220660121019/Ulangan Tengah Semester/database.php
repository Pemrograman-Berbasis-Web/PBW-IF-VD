<?php

	$conn = mysqli_connect('localhost', 'root', '', 'todolist') or die ('Gagal terhubung ke database');
    if (!$conn) {
        die("Gagal terhubung ke database: " . mysqli_connect_error());
    }
    