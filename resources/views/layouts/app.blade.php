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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Estilos del Navbar */
        .navbar-custom {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 16px;
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Sombras para dar más profundidad */
            transition: background-color 0.3s ease;
        }

        /* Efecto de fondo sticky cuando se hace scroll */
        .navbar-sticky {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px); /* Efecto de desenfoque */
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2); /* Sombras más profundas */
        }

        /* Estilos del botón hamburguesa */
        .navbar-custom .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        /* Las barras del botón hamburguesa */
        .navbar-custom .menu-toggle div {
            width: 30px;
            height: 4px;
            background-color: #333;
            margin: 5px 0;
            border-radius: 2px;
            transition: all 0.4s ease;
        }

        /* Transformación del botón hamburguesa en una X cuando se hace clic */
        .menu-toggle.active div:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }

        .menu-toggle.active div:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active div:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        /* Estilos del menú */
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
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.4s, color 0.4s, box-shadow 0.4s;
        }

        .navbar-custom nav ul li a:hover {
            background-color: #007bff;
            color: #fff;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3); /* Sombra al pasar el ratón */
        }

        .navbar-custom .menu {
            display: flex;
            align-items: center;
        }

        /* Mobile-first: Ajustes para pantallas pequeñas */
        @media (max-width: 768px) {
            .navbar-custom .menu-toggle {
                display: flex;
            }

            /* Menú desplegable animado en dispositivos móviles */
            .navbar-custom nav ul {
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.95); /* Fondo semi-transparente */
                transform: translateY(-150%);
                transition: transform 0.6s ease, opacity 0.6s;
                z-index: 9999;
                opacity: 0;
                visibility: hidden;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); /* Sombras más profundas */
            }

            .navbar-custom nav ul.show-menu {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            .navbar-custom nav ul li a {
                padding: 16px;
                border-bottom: 1px solid #ddd;
                text-align: center;
                transition: all 0.4s ease;
            }

            .navbar-custom h1 {
                font-size: 1.8rem;
                text-align: center;
                flex: 1;
            }
        }

        /* Ajustes para pantallas grandes */
        @media (min-width: 769px) {
            .navbar-custom nav ul {
                flex-direction: row;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-sm mb-4 navbar-custom" id="navbar">
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
                    <li><a href="{{ route('torneos.index') }}"><i class="bi bi-calendar"></i> Torneos</a></li>
                    @auth
                        <li><a href="{{ route('admin.torneos.index') }}"><i class="bi bi-calendar"></i> Torneos Admin</a></li>
                        @if(auth()->user()->is_admin)
                            <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-lock-fill"></i> Administrador</a></li>
                        @endif
                    @endauth
                    <li><a href="{{ route('equipos') }}"><i class="bi bi-people-fill"></i> Equipos</a></li>
                    <li><a href="{{ route('clasificacion') }}"><i class="bi bi-list"></i> Clasificación</a></li>
                    <li><a href="{{ route('goleadores') }}"><i class="bi bi-star-fill"></i> Goleadores</a></li>
                    <li><a href="{{ route('galeria') }}"><i class="bi bi-image"></i> Fotos y Videos</a></li>
                    @auth
                        <li><a href="#"><i class="bi bi-gear-fill"></i> Configuración</a></li>
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
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
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
        const toggleButton = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('nav ul');
        const navbar = document.getElementById('navbar');

        // Evento para abrir/cerrar el menú
        toggleButton.addEventListener('click', function() {
            toggleButton.classList.toggle('active');
            navMenu.classList.toggle('show-menu');
        });

        // Añadir el efecto sticky al hacer scroll
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-sticky');
            } else {
                navbar.classList.remove('navbar-sticky');
            }
        });
    </script>
</body>
</html>
