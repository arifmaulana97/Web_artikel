<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            /* Menggunakan font default Laravel */
            background-color: #f0f2f5;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 15px 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 10px 10px;
            position: relative;
            z-index: 1000;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.8em;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }

        .navbar-brand span {
            background: linear-gradient(to right, #6a82fb, #fc5c7d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        .navbar-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-nav li {
            margin-left: 30px;
        }

        .navbar-nav a {
            text-decoration: none;
            color: #555;
            font-size: 1.1em;
            transition: color 0.3s ease;
        }

        .navbar-nav a:hover {
            color: #007bff;
        }

        .navbar-notch {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 30px;
            background-color: #333;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            z-index: 1001;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px 20px;
            }

            .navbar-nav {
                margin-top: 15px;
                flex-direction: column;
                width: 100%;
            }

            .navbar-nav li {
                margin: 5px 0;
            }

            .navbar-brand {
                margin-bottom: 10px;
            }

            .navbar-notch {
                width: 100px;
                height: 20px;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        @include('partials.navbar') <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
