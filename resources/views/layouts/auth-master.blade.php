<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplicación de Login')</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/tailwind.min.css') }}">

    <style>
        body {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            background-color: #f3f4f6; /* Fondo gris claro */
        }
        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <main class="form-container">
        @yield('content')
    </main>

    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
