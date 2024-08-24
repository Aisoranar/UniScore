<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UNISCORE')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .navbar-custom {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-custom .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
        }

        .navbar-custom .menu-toggle div {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 4px 0;
            transition: 0.4s;
        }

        .navbar-custom nav ul {
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .navbar-custom nav ul li a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar-custom nav ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .navbar-custom .menu {
            display: flex;
            align-items: center;
        }

        /* Mobile view adjustments */
        @media (max-width: 768px) {
            .navbar-custom .menu-toggle {
                display: flex;
            }

            .navbar-custom nav ul {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 0;
                background-color: #fff;
                transform: translateY(-200%);
                transition: transform 0.3s ease-in-out;
                z-index: 9999;
            }

            .navbar-custom nav ul.show-menu {
                transform: translateY(0);
            }

            .navbar-custom nav ul li {
                flex: 1 1 50%;
                text-align: center;
            }

            .navbar-custom nav ul li a {
                padding: 15px;
                border-bottom: 1px solid #ddd;
            }

            .navbar-custom .menu {
                flex: 1;
            }

            .navbar-custom h1 {
                font-size: 1.5rem;
                text-align: center;
                flex: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-sm mb-4">
        <div class="container mx-auto p-4 navbar-custom">
            <h1 class="text-3xl font-bold">UNISCORE</h1>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i> Inicio</a></li>
                   <!-- Public <li><a href="{{ route('torneos.index') }}"><i class="bi bi-calendar"></i> Torneos</a></li>--> 
                    <li><a href="{{ route('admin.torneos.index') }}"><i class="bi bi-calendar"></i> Torneos</a></li>
                    <li><a href="#"><i class="bi bi-people-fill"></i> Equipos</a></li>
                    <li><a href="#"><i class="bi bi-list"></i> Clasificación</a></li>
                    <li><a href="#"><i class="bi bi-star-fill"></i> Goleadores</a></li>
                    <li><a href="#"><i class="bi bi-image"></i> Fotos y Videos</a></li>
                    <li><a href="#"><i class="bi bi-gear-fill"></i> Configuración</a></li>
                    @auth
                        <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-lock-fill"></i> Administrador</a></li>
                        <li><a href="{{ route('logout') }}" class="text-danger"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a></li>
                    @endauth
                    @guest
                        <li><a href="{{ route('login.show') }}" class="btn btn-primary"><i class="bi bi-person-fill"></i> Iniciar Sesión</a></li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-4 py-4">
        <div class="container text-center">
            <p>&copy; 2024 UNISCORE. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('nav ul').classList.toggle('show-menu');
        });
    </script>
</body>
</html>
