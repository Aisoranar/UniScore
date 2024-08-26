@extends('layouts.app')

@section('content')

    <!-- Sección de Bienvenida -->
    <section class="welcome-section bg-gradient-to-r from-green-500 to-blue-600 text-white py-12">
        <div class="container mx-auto px-6 text-center">
            
            @guest
                <div class="p-8 bg-white bg-opacity-20 shadow-lg rounded-2xl mx-auto max-w-xl">
                    <div class="mb-6 text-6xl text-black">
                        <i class="fas fa-greeting"></i>
                    </div>
                    <p class="text-4xl font-extrabold mb-4 text-black">¡Bienvenido a UNISCORE!</p>
                    <p class="text-xl mb-6 text-black">Explora torneos deportivos, consulta tablas de posiciones y próximos partidos sin necesidad de iniciar sesión.</p>
                </div>
            @endguest

            @auth
                <div class="p-8 bg-white bg-opacity-20 shadow-lg rounded-2xl mx-auto max-w-xl">
                    <div class="mb-6 text-6xl text-black">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h2 class="text-4xl font-extrabold mb-4 text-black">¡Hola, {{ auth()->user()->name ?? auth()->user()->username }}!</h2>
                    <p class="text-xl mb-6 text-black">Como administrador, tienes acceso completo para gestionar torneos. Utiliza nuestras herramientas avanzadas para facilitar tu trabajo.</p>
                    <a href="{{ route('logout') }}" class="inline-block px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-lg hover:bg-red-700 transition-colors duration-300">Cerrar Sesión</a>
                </div>
            @endauth

        </div>
    </section>

   <!-- Sección de Torneos Activos -->
<section class="tournaments-section py-12 bg-gray-200">
    <div class="container mx-auto px-6">
        <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-10">
            <i class="fas fa-trophy"></i> Torneos Activos
        </h1>

        @if(isset($torneos) && $torneos->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($torneos as $torneo)
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="text-4xl text-blue-500 mb-4">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h5 class="text-2xl font-semibold mb-3 text-gray-800">{{ $torneo->nombre }}</h5>
                        <p class="text-gray-700 mb-4">{{ $torneo->descripcion }}</p>
                        <a href="{{ route('torneos.show', $torneo->id) }}" class="inline-block px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-300">Ver Torneo</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600 mt-6">No hay torneos disponibles en este momento.</p>
        @endif
    </div>
    
</section>





    <!-- Sección de Información General -->
    <section class="info-section py-12 bg-gray-100">
        <div class="container mx-auto px-6">
            <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-10">
                <i class="fas fa-info-circle"></i> Información General
            </h1>
            <p class="text-center text-xl mb-8 text-gray-800">UNISCORE es tu plataforma para gestionar y visualizar torneos deportivos. Explora eventos, consulta tablas de posiciones y aprovecha nuestras herramientas avanzadas para administradores.</p>
            <div class="flex flex-col md:flex-row md:justify-center md:space-x-10 mt-8">
                <div class="bg-white p-6 rounded-lg shadow-md mb-6 md:mb-0 md:w-1/2">
                    
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">
                        <div class="text-4xl text-green-500 mb-4">
                            <i class="fas fa-eye"></i> Para Visitantes
                        </div>
                    </h3>
                    <p class="text-gray-800">Explora información sobre torneos sin necesidad de iniciar sesión. Consulta tablas de posiciones, próximos partidos y eventos en tiempo real.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">
                        <div class="text-4xl text-blue-500 mb-4">
                            <i class="fas fa-cogs"></i>Para Administradores
                        </div>
                    </h3>
                    <p class="text-gray-800">Inicia sesión para acceder a herramientas avanzadas. Administra torneos, añade resultados, controla clasificaciones y mucho más.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Administración de Torneos -->
    @auth
        <section class="admin-section py-12 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-10">
                    <i class="fas fa-tools"></i> Administración de Torneos
                </h2>
                
                <div class="space-y-10">
                    <!-- Gestión de Torneos Existentes -->
                    <div class="bg-gray-100 p-8 rounded-lg shadow-md">
                        
                        <h3 class="text-3xl font-semibold mb-4 text-gray-800">
                            <div class="text-4xl text-gray-800 mb-4">
                                <i class="fas fa-list-alt"></i> Torneos Existentes
                            </div>
                        </h3>
                        <p class="text-gray-800">Administra torneos actuales y pasados, revisa su estado, edita información y realiza otras acciones.</p>
                        <div class="mt-4">
                            <a href="{{ route('admin.torneos.index') }}" class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">Ver Torneos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endauth

    <!-- Sección de Resultados y Estadísticas -->
    <section class="stats-section py-12 bg-gray-200">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-10">
                <i class="fas fa-chart-line"></i> Resultados y Estadísticas
            </h2>
                
            <div class="space-y-10">
                <!-- Resultados de Partidos -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    
                    <h3 class="text-3xl font-semibold mb-4 text-gray-800">
                        <div class="text-4xl text-blue-500 mb-4">
                            <i class="fas fa-futbol"></i> Resultados de Partidos
                        </div>
                    </h3>
                    <p class="text-gray-800">Ingresa y visualiza resultados de partidos, así como los próximos partidos programados.</p>
                </div>

                <!-- Tabla de Posiciones -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    
                    <h3 class="text-3xl font-semibold mb-4 text-gray-800">
                        <div class="text-4xl text-green-500 mb-4">
                            <i class="fas fa-tachometer-alt"></i> Tabla de Posiciones
                        </div>
                    </h3>
                    <p class="text-gray-800">Consulta la tabla de posiciones en tiempo real para cada torneo en curso.</p>
                </div>

                <!-- Goleadores y Mejores Jugadores -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    
                    <h3 class="text-3xl font-semibold mb-4 text-gray-800">
                        <div class="text-4xl text-yellow-500 mb-4">
                            <i class="fas fa-star"></i> Goleadores y Mejores Jugadores
                        </div>
                    </h3>
                    <p class="text-gray-800">Visualiza la lista de goleadores y los mejores jugadores de los torneos.</p>
                </div>

                <!-- Fotos y Videos -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    
                    <h3 class="text-3xl font-semibold mb-4 text-gray-800">
                        <div class="text-4xl text-red-500 mb-4">
                            <i class="fas fa-camera"></i> Fotos y Videos
                        </div>
                    </h3>
                    <p class="text-gray-800">Accede a la galería de fotos y videos de los torneos.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
