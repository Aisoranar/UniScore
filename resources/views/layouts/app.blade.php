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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        .navbar-custom {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 16px;
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .navbar-sticky {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .menu-toggle div {
            width: 30px;
            height: 4px;
            background-color: #333;
            margin: 5px 0;
            border-radius: 2px;
            transition: all 0.4s ease;
        }

        .menu-toggle.active div:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }

        .menu-toggle.active div:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active div:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        nav ul {
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        nav ul li a {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.4s, color 0.4s, box-shadow 0.4s;
        }

        nav ul li a:hover {
            background-color: #007bff;
            color: #fff;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.3);
        }

        .menu {
            display: flex;
            align-items: center;
        }

        @media (max-width: 1024px) {
            .menu-toggle {
                display: flex;
            }

            nav ul {
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.95);
                transform: translateY(-150%);
                transition: transform 0.6s ease, opacity 0.6s;
                z-index: 9999;
                opacity: 0;
                visibility: hidden;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            }

            nav ul.show-menu {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }

            nav ul li a {
                padding: 16px;
                border-bottom: 1px solid #ddd;
                text-align: center;
                transition: all 0.4s ease;
            }

            h1 {
                font-size: 1.8rem;
                text-align: center;
                flex: 1;
            }
        }

        @media (min-width: 1025px) {
            nav ul {
                flex-direction: row;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-sm mb-4 navbar-custom" id="navbar">
        <div class="container mx-auto p-4 navbar-custom">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <h1 class="text-3xl font-bold mr-2">UNISCORE</h1>
                    <a href="{{ route('home.index') }}">
                        <img src="{{ asset('assets/img/uniscoreicon.svg') }}" alt="Icono de Uniscore" class="h-16 w-16">
                    </a>
                </div>
                <div class="menu-toggle">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <nav class="menu mt-4 lg:mt-0">
                <ul class="flex flex-col lg:flex-row items-center lg:items-center gap-4 lg:gap-8">
                    <li><a href="{{ route('home.index') }}"><i class="bi bi-house-door-fill"></i> Inicio</a></li>
                    <li><a href="#"><i class="bi bi-calendar"></i> Torneos</a></li>
                    @auth
                        <li><a href="#"><i class="bi bi-calendar"></i> Torneos Admin</a></li>
                        @if(auth()->user()->is_admin)
                            <li><a href="#"><i class="bi bi-lock-fill"></i> Administrador</a></li>
                        @endif
                    @endauth
                    <li><a href="#"><i class="bi bi-people-fill"></i> Equipos</a></li>
                    <li><a href="#"><i class="bi bi-list"></i> Clasificación</a></li>
                    <li><a href="#"><i class="bi bi-star-fill"></i> Goleadores</a></li>
                    <li><a href="#"><i class="bi bi-image"></i> Fotos y Videos</a></li>
                    @if(Auth::check())
                        @if(Auth::user()->role === 'trainee')
                            <li><a href="{{ route('perfil.editar', ['id' => Auth::id()]) }}" class="nav-link text-black font-semibold hover:text-yellow-300 transition duration-300 flex items-center @if(request()->routeIs('perfil.editar')) active @endif">
                                <i class="fas fa-user-graduate mr-2"></i> Perfil
                            </a></li>
                        @endif

                        @if(Auth::user()->role === 'coach')
                            <li><a href="{{ route('coach.perfil.show', ['id' => Auth::user()->id]) }}" class="nav-link text-black font-semibold hover:text-yellow-300 transition duration-300 flex items-center">
                                <i class="fas fa-chalkboard-teacher mobile-nav-icon"></i> Perfil Coach
                            </a></li>
                        @endif

                        @if(Auth::user()->role === 'superadmin')
                            <li><a href="{{ route('users.index') }}" class="nav-link text-black font-semibold hover:text-yellow-300 transition duration-300 flex items-center @if(request()->routeIs('users.index')) active @endif">
                                <i class="fas fa-cogs mr-2"></i> Configuración
                            </a></li>
                        @endif

                        <li>
                            <form id="logout-form" action="{{ route('logout.perform') }}" method="POST" class="flex items-center">
                                @csrf
                                <button type="submit" class="nav-link text-black font-semibold hover:text-yellow-300 transition duration-300 flex items-center">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    @endif
                    @guest
                        <li><a href="#" class="btn btn-primary"><i class="bi bi-person-fill"></i> Iniciar Sesión</a></li>
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
    <footer style="background-color: #343a40; color: #ffffff; margin-top: 1rem; padding-top: 1rem; padding-bottom: 1rem;">
        <div style="text-align: center;">
            <p style="margin-bottom: 0;">&copy; 2024 UNISCORE. Todos los derechos reservados.</p>
            <p style="margin-bottom: 0;">
                Diseñado por: 
                <a href="https://www.linkedin.com/in/aisoranar/" target="_blank" 
                   style="color: #f8f9fa; text-decoration: none; font-weight: bold; 
                          transition: color 0.3s ease, text-shadow 0.3s ease; 
                          text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);">
                    Aisor Anaya
                </a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        const toggleButton = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('nav ul');
        const navbar = document.getElementById('navbar');

        toggleButton.addEventListener('click', function() {
            toggleButton.classList.toggle('active');
            navMenu.classList.toggle('show-menu');
        });

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
