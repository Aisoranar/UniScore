<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication')</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        /* Fondo dinámico con degradado animado en tonos de azul */
        body {
            background: linear-gradient(120deg, #1e3a8a, #2563eb, #60a5fa, #93c5fd);
            background-size: 200% 200%;
            animation: gradientAnimation 8s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Inter', sans-serif;
        }

        /* Animación del fondo */
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Animaciones para labels flotantes */
        .floating-label {
            position: relative;
        }

        .floating-label input,
        .floating-label select {
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: all 0.3s ease;
            background-color: transparent;
        }

        .floating-label label {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            padding: 0 5px;
            color: #888;
            font-size: 16px;
            transition: all 0.2s ease;
            pointer-events: none;
        }

        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label,
        .floating-label select:focus + label,
        .floating-label select:not(:placeholder-shown) + label {
            top: -10px;
            left: 10px;
            font-size: 12px;
            color: #2563eb;
        }

        /* Botón primario con efecto */
        .btn-primary {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            background-color: #1e3a8a;
        }
    </style>
</head>
<body>
    <!-- Contenedor principal con margen horizontal específico para móviles -->
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8 mx-4 sm:mx-auto sm:p-12 sm:mt-10 sm:mb-10">
        @yield('content')
    </div>
</body>
</html>
