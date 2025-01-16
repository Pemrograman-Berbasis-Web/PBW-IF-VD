<!-- resources/views/posts/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Post</title>

    <!-- Menambahkan link CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-size: 1.1em;
        }

        input, textarea {
            padding: 10px;
            font-size: 1em;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Tambah Post</h1>

        <!-- Form untuk membuat post -->
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <label for="title">Judul</label>
            <input type="text" name="title" id="title" required>

            <label for="body">Isi</label>
            <textarea name="body" id="body" required></textarea>

            <label for="content">Content</label>
            <textarea name="content" id="content"></textarea> <!-- Kolom content -->

            <button type="submit">Create Post</button>
        </form>

        <!-- Link kembali ke daftar post -->
        <a href="{{ route('posts.index') }}" class="btn-secondary">Kembali ke Daftar Post</a>
    </div>

    <!-- Menambahkan link ke file JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Placeholder untuk interaksi atau animasi
            console.log('Halaman Tambah Post Loaded');
        });
    </script>

</body>
</html>
