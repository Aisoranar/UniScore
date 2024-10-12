<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UNISCORE')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/ISOLOGOASRANS.svg') }}" type="image/svg+xml">

    <!-- Meta Descripción para SEO -->
    <meta name="description" content="UNISCORE">

    <!-- Keywords para SEO -->
    <meta name="keywords" content="UNISCORE">

    <!-- Meta Open Graph para redes sociales -->
    <meta property="og:title" content="UNISCORE">
    <meta property="og:description" content="UNISCORE">
    <meta property="og:image" content="{{ asset('assets/img/ISOLOGOASRANS.svg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Meta Twitter Card para compartir en Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="UNISCORE">
    <meta name="twitter:description" content="UNISCORE">
    <meta name="twitter:image" content="{{ asset('assets/img/ISOLOGOASRANS.svg') }}">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        /* Navbar hover/active effects */
        .nav-link {
            position: relative;
            display: inline-block;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: -4px;
            height: 2px;
            background-color: #FFD700;
            width: 0;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        /* Mobile menu transition */
        #mobile-menu {
            transition: max-height 0.5s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        #mobile-menu.open {
            max-height: 500px;
            opacity: 1;
        }

        /* Mobile nav link styles */
        .mobile-nav-link {
            display: block;
            padding: 10px;
            text-align: center;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .mobile-nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .mobile-nav-icon {
            margin-right: 8px;
        }

        /* Animation for user actions */
        .btn-hover-grow {
            transition: transform 0.3s;
        }
        .btn-hover-grow:hover {
            transform: scale(1.05);
        }

        /* Fade-in effect */
        .fade-in {
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive adjustments */
        @media (min-width: 640px) {
            #mobile-menu {
                max-height: none;
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 antialiased leading-normal flex flex-col min-h-screen">
    <!-- Navbar -->
    <header class="bg-blue-900 shadow-lg">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="/" class="text-white font-bold text-xl hover:text-yellow-300 transition duration-300">
                    <img src="/assets/img/ISOLOGOASRANS.svg" alt="Isologo" class="inline-block w-8 h-8" /> UNISCORE
                </a>
                
                <!-- Mobile Menu Toggle -->
                <button class="text-white sm:hidden focus:outline-none" id="nav-toggle">
                    <svg class="w-6 h-6 hover:text-yellow-300 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
        
                <!-- Desktop Menu -->
                <nav class="hidden sm:flex space-x-6 items-center" id="nav-menu">
                    <a href="{{ route('home.index') }}" class="nav-link text-white font-semibold hover:text-yellow-300 transition duration-300 flex items-center @if(request()->routeIs('home.index')) active @endif">
                        <i class="fas fa-home mr-2"></i> Inicio
                    </a>
                
                    @if(Auth::check())
                        @if(Auth::user()->role === 'trainee')
                            <!-- Perfil Trainee -->
                            <a href="{{ route('perfil.editar', ['id' => Auth::id()]) }}" class="nav-link text-white font-semibold hover:text-yellow-300 transition duration-300 flex items-center @if(request()->routeIs('perfil.editar')) active @endif">
                                <i class="fas fa-user-graduate mr-2"></i> Perfil
                            </a>
                        @endif
                
                        @if(Auth::user()->role === 'coach')  <!-- Cambié 'docent' a 'coach' -->
                            <!-- Perfil Coach -->
                            <a href="{{ route('coach.perfil.show', ['id' => Auth::user()->id]) }}" class="nav-link text-white font-semibold hover:text-yellow-300 transition duration-300 flex items-center">
                                <i class="fas fa-chalkboard-teacher mobile-nav-icon"></i> Perfil Coach
                            </a>
                        @endif
                
                        @if(Auth::user()->role === 'superadmin')
                            <a href="{{ route('users.index') }}" class="nav-link text-white font-semibold hover:text-yellow-300 transition duration-300 flex items-center @if(request()->routeIs('users.index')) active @endif">
                                <i class="fas fa-cogs mr-2"></i> Configuración
                            </a>
                        @endif
                
                        <!-- Logout button -->
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST" class="flex items-center">
                            @csrf
                            <button type="submit" class="nav-link text-white font-semibold hover:text-yellow-300 transition duration-300 flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                            </button>
                        </form>
                    @endif
                </nav>
                
            </div>
        
            <!-- Mobile Menu -->
        <div class="sm:hidden bg-blue-800 py-2" id="mobile-menu">
            <a href="{{ route('home.index') }}" class="mobile-nav-link">
                <i class="fas fa-home mobile-nav-icon"></i> Inicio
            </a>



            @if(Auth::check() && Auth::user()->role === 'docent')
                <!-- Perfil coach -->
                <a href="{{ route('coach.perfil.show', ['id' => Auth::user()->id]) }}" class="mobile-nav-link">
                    <i class="fas fa-chalkboard-teacher mobile-nav-icon"></i> Perfil coach
                </a>
            @endif

            @if(Auth::check() && Auth::user()->role === 'superadmin')
                <a href="{{ route('users.index') }}" class="mobile-nav-link">
                    <i class="fas fa-cogs mobile-nav-icon"></i> Configuración
                </a>
            @endif

            <!-- Mobile Logout -->
            @if(Auth::check())
                <form id="logout-form-mobile" action="{{ route('logout.perform') }}" method="POST" class="block text-center">
                    @csrf
                    <button type="submit" class="mobile-nav-link">
                        <i class="fas fa-sign-out-alt mobile-nav-icon"></i> Cerrar Sesión
                    </button>
                </form>
            @endif
        </div>

    </header>
    

    <!-- Main Content -->
    <main class="flex-grow container mx-auto py-0,1 fade-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-4 mt-auto">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} UNISCORE</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.getElementById('nav-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('open');
        });
    </script>

    @stack('scripts')
</body>
</html>
