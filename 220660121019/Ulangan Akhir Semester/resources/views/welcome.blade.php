<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ulangan Tengah Semester</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Tambahkan style untuk background -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url("{{ asset('images/ourteam3.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            color: white;
            text-align: center;
        }

        .content {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
        }

        .title {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .links {
            margin-top: 10px;
        }

        .links a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            font-weight: 600;
            padding: 10px 20px;
            border: 2px solid white;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .links a:hover {
            background-color: #ea6e1f;
            /* Warna background saat hover */
            color: white;
            /* Warna teks saat hover */
            border-color: white;
            /* Warna garis saat hover */
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            WELCOME TO MY PROJECT
        </div>

        @if (Route::has('login'))
        <div class="links">
            <a href="{{ route('customers') }}">Customers</a>

            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif
    </div>
</body>

</html>