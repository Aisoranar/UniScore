@extends('layouts.app')

@section('content')

    <!-- Sección de Bienvenida -->
    <section class="welcome-section bg-gradient-to-r from-green-500 to-blue-600 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            
            @guest
                <div class="p-6 bg-white bg-opacity-20 shadow-lg rounded-xl mx-auto max-w-lg">
                    <p class="text-3xl font-bold mb-4 text-black">Bienvenido a UNISCORE</p>
                    <p class="text-lg mb-4 text-black">Explora la información sobre torneos deportivos, incluyendo tablas de posiciones y próximos partidos sin necesidad de iniciar sesión.</p>
                    <a href="{{ route('admin.login') }}" class="inline-block px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg shadow-lg hover:bg-gray-100 transition duration-300">Administrador</a>
                </div>
            @endguest

            @auth
                <div class="p-6 bg-white bg-opacity-20 shadow-lg rounded-xl mx-auto max-w-lg">
                    <h2 class="text-3xl font-bold mb-3 text-black">Bienvenido, {{ auth()->user()->name ?? auth()->user()->username }}</h2>
                    <p class="text-lg mb-4 text-black">Como administrador, puedes gestionar y administrar torneos deportivos. Aprovecha todas las herramientas disponibles para facilitar tu labor.</p>
                    <a href="{{ route('logout') }}" class="inline-block px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-lg hover:bg-red-700 transition duration-300">Cerrar Sesión</a>
                </div>
            @endauth

        </div>
    </section>

    <!-- Sección de Información General -->
    <section class="info-section py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-8">Información General</h1>
            <p class="text-center text-xl mb-4 text-black">UNISCORE es tu plataforma para gestionar y visualizar torneos deportivos. Aquí podrás explorar eventos deportivos, ver tablas de posiciones, y acceder a herramientas avanzadas para administradores.</p>
            <div class="flex flex-col md:flex-row md:justify-center md:space-x-8 mt-8">
                <div class="bg-white p-6 rounded-lg shadow-md mb-6 md:mb-0 md:w-1/2">
                    <h3 class="text-2xl font-semibold mb-3 text-black">Para Visitantes</h3>
                    <p class="text-black">Explora la información disponible sobre los torneos sin necesidad de iniciar sesión. Consulta tablas de posiciones, próximos partidos y eventos deportivos en tiempo real.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold mb-3 text-black">Para Administradores</h3>
                    <p class="text-black">Inicia sesión para acceder a herramientas avanzadas. Administra torneos, añade resultados, controla clasificaciones y mucho más.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Torneos Activos -->
    <section class="tournaments-section py-12 bg-gray-200">
        <div class="container mx-auto px-4">
            <h1 class="text-center text-4xl font-extrabold text-gray-800 mb-8">Torneos Activos</h1>

            @if(isset($torneos) && $torneos->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($torneos as $torneo)
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <h5 class="text-2xl font-bold mb-3 text-black">{{ $torneo->nombre }}</h5>
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

    @auth
        <!-- Sección de Administración de Torneos -->
        <section class="admin-section py-12 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-8">Administración de Torneos</h2>
                
                <div class="space-y-8">
            
                    <!-- Gestión de Torneos Existentes -->
                    <div class="bg-gray-100 p-8 rounded-lg shadow-md">
                        <h3 class="text-3xl font-semibold mb-4 text-black">Torneos Existentes</h3>
                        <p class="text-black">Administra los torneos actuales y pasados, revisa su estado, edita información y realiza otras acciones.</p>
                        <div class="mt-4">
                            <a href="{{ route('admin.torneos.index') }}" class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">Ver Torneos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de Resultados y Estadísticas -->
        <section class="stats-section py-12 bg-gray-200">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-extrabold text-gray-800 mb-8">Resultados y Estadísticas</h2>
                
                <div class="space-y-8">
                    <!-- Resultados de Partidos -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <h3 class="text-3xl font-semibold mb-4 text-black">Resultados de Partidos</h3>
                        <p class="text-black">Aquí puedes ingresar y visualizar los resultados de los partidos, así como los próximos partidos programados.</p>
                        <!-- Formulario o enlaces para ingresar resultados de partidos -->
                    </div>

                    <!-- Tabla de Posiciones -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <h3 class="text-3xl font-semibold mb-4 text-black">Tabla de Posiciones</h3>
                        <p class="text-black">Consulta la tabla de posiciones en tiempo real para cada torneo en curso.</p>
                        <!-- Enlace o sección para visualizar clasificación -->
                    </div>

                    <!-- Goleadores y Mejores Jugadores -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <h3 class="text-3xl font-semibold mb-4 text-black">Goleadores y Mejores Jugadores</h3>
                        <p class="text-black">Visualiza la lista de goleadores y los mejores jugadores de los torneos.</p>
                        <!-- Enlace o sección para visualizar goleadores y mejores jugadores -->
                    </div>

                    <!-- Fotos y Videos -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <h3 class="text-3xl font-semibold mb-4 text-black">Fotos y Videos</h3>
                        <p class="text-black">Sube y visualiza imágenes y videos relacionados con los torneos y eventos.</p>
                        <!-- Formulario o enlaces para subir fotos y videos -->
                    </div>

                    <!-- Configuración del Torneo -->
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <h3 class="text-3xl font-semibold mb-4 text-black">Configuración del Torneo</h3>
                        <p class="text-black">Configura detalles básicos del torneo, incluyendo reglas, premios y contacto.</p>
                        <!-- Formulario o enlaces para configurar detalles del torneo -->
                    </div>
                </div>
            </div>
        </section>
    @endauth

@endsection
