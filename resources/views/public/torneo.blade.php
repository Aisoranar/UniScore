@extends('layouts.app')

@section('content')
<main class="container mx-auto p-4">
    <section class="tournaments-section py-12 bg-gray-100">
        <div class="container mx-auto px-6">
            <h1 class="text-center text-5xl font-extrabold text-gray-900 mb-12">
                <i class="fas fa-trophy text-yellow-400"></i> Torneos Disponibles
            </h1>

            <!-- Filtros -->
            <div class="mb-8 flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <input id="filter-nombre" type="text" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg shadow-md" placeholder="Ingrese el nombre del torneo">
                <select id="filter-tipo" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg shadow-md">
                    <option value="">Filtrar por Tipo de Torneo</option>
                    <option value="todos contra todos">Todos contra Todos</option>
                    <option value="grupos">Grupos</option>
                    <option value="eliminatorias + grupos">Eliminatorias + Grupos</option>
                </select>
                <select id="filter-genero" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg shadow-md">
                    <option value="">Filtrar por Género</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="mixto">Mixto</option>
                </select>
                <select id="filter-estado" class="bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg shadow-md">
                    <option value="">Filtrar por Estado</option>
                    <option value="activo">Activo</option>
                    <option value="finalizado">Finalizado</option>
                </select>
            </div>

            @if(isset($torneos) && $torneos->count() > 0)
                <div id="tournaments-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $colors = ['bg-red-500', 'bg-green-500', 'bg-blue-500', 'bg-purple-500', 'bg-yellow-500', 'bg-indigo-500', 'bg-pink-500'];
                        $icons = [
                            'fas fa-futbol',
                            'fas fa-shoe-prints',
                            'fas fa-flag-checkered',
                            'fas fa-stopwatch',
                            'fas fa-tshirt',
                            'fas fa-user-shield',
                            'fas fa-whistle',
                        ];
                        $index = 0;
                    @endphp
                    
                    @foreach($torneos as $torneo)
                        @php
                            $color = $colors[$index % count($colors)];
                            $icon = $icons[$index % count($icons)];
                            $index++;
                        @endphp

                        <div class="tournament-card relative {{ $color }} rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden p-6 transform hover:scale-105 transition-transform duration-300"
                            data-nombre="{{ $torneo->nombre }}" 
                            data-tipo="{{ $torneo->tipo }}"
                            data-estado="{{ $torneo->estado }}" 
                            data-genero="{{ $torneo->genero }}">
                            <div class="absolute top-4 right-4">
                                @if($torneo->estado === 'activo')
                                    <span class="inline-block w-5 h-5 bg-green-400 rounded-full shadow-md animate-pulse" title="Activo"></span>
                                @elseif($torneo->estado === 'finalizado')
                                    <span class="inline-block w-5 h-5 bg-red-400 rounded-full shadow-md animate-pulse" title="Finalizado"></span>
                                @endif
                            </div>

                            <div class="flex items-center justify-center h-32 mb-6 text-white">
                                <i class="{{ $icon }} text-7xl"></i>
                            </div>

                            <h5 class="text-center text-2xl font-semibold mb-3 text-white">{{ $torneo->nombre }}</h5>
                            <p class="text-center text-white mb-4">{{ Str::limit($torneo->descripcion, 100) }}</p>
                            
                            <div class="text-center">
                                <a href="{{ route('torneos.show', $torneo->id) }}" class="inline-block px-6 py-2 bg-white text-gray-800 font-bold rounded-full hover:bg-gray-200 transition-colors duration-300">Ver Detalles</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Paginación -->
                <div class="mt-8">
                    {{ $torneos->links() }}
                </div>
            @else
                <p class="text-center text-2xl text-gray-700 mt-12">No hay torneos disponibles en este momento.</p>
            @endif
        </div>
    </section>

    <!-- Botón flotante para crear torneo -->
    <a href="{{ route('admin.torneos.create') }}" class="fixed bottom-4 right-4 bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-700 transition-colors duration-300">
        <i class="fas fa-plus text-2xl"></i>
        <span class="sr-only">Crear Torneo</span>
    </a>

    <!-- Botón flotante para configurar torneos -->
    <a href="{{ route('admin.torneos.index') }}" class="fixed bottom-16 right-4 bg-blue-600 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition-colors duration-300">
        <i class="fas fa-cog text-2xl"></i>
        <span class="sr-only">Configurar Torneos</span>
    </a>

    <script>
        document.getElementById('filter-nombre').addEventListener('input', applyFilters);
        document.getElementById('filter-tipo').addEventListener('change', applyFilters);
        document.getElementById('filter-genero').addEventListener('change', applyFilters);
        document.getElementById('filter-estado').addEventListener('change', applyFilters);

        function applyFilters() {
            const nombreFilter = document.getElementById('filter-nombre').value.toLowerCase();
            const tipoFilter = document.getElementById('filter-tipo').value.toLowerCase();
            const generoFilter = document.getElementById('filter-genero').value.toLowerCase();
            const estadoFilter = document.getElementById('filter-estado').value.toLowerCase();

            document.querySelectorAll('.tournament-card').forEach(card => {
                const nombre = card.getAttribute('data-nombre').toLowerCase();
                const tipo = card.getAttribute('data-tipo').toLowerCase();
                const genero = card.getAttribute('data-genero').toLowerCase();
                const estado = card.getAttribute('data-estado').toLowerCase();

                // Aplica el filtro si los valores coinciden o están vacíos (sin filtro)
                if ((nombreFilter === '' || nombre.includes(nombreFilter)) &&
                    (tipoFilter === '' || tipo === tipoFilter) &&
                    (generoFilter === '' || genero === generoFilter) &&
                    (estadoFilter === '' || estado === estadoFilter)) {
                    card.style.display = ''; // Muestra la tarjeta si cumple con los filtros
                } else {
                    card.style.display = 'none'; // Oculta la tarjeta si no cumple
                }
            });
        }
    </script>
</main>
@endsection
