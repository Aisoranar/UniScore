@extends('layouts.app')

@section('title', 'Equipos del Torneo')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-5xl font-bold text-center text-gray-800 mb-10">Equipos del Torneo - {{ $torneo->nombre }}</h1>

        <!-- Lista de equipos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($equipos as $equipo)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-transform duration-300">
                    <div onclick="togglePlayers({{ $equipo->id }})" class="cursor-pointer p-6">
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-semibold text-gray-700">{{ $equipo->nombre }}</div>
                            <div class="text-sm text-gray-500 bg-gray-200 rounded-full px-3 py-1">Puntos: {{ $equipo->puntos }}</div>
                        </div>
                    </div>
                    <div id="players-{{ $equipo->id }}" class="hidden p-6 border-t border-gray-200 bg-gray-50">
                        @foreach ($equipo->jugadores as $jugador)
                            <div class="py-2 flex items-center justify-between hover:bg-gray-100 transition-colors duration-200 px-3 rounded-lg">
                                <div>
                                    <strong class="text-gray-800">{{ $jugador->nombre }}</strong>
                                    <div class="text-xs text-gray-600 mt-1">
                                        @if($jugador->tarjetas_amarillas > 0)
                                            <span class="text-yellow-500"><i class="fas fa-square"></i> {{ $jugador->tarjetas_amarillas }}</span>
                                        @endif
                                        @if($jugador->tarjetas_rojas > 0)
                                            <span class="text-red-500 ml-2"><i class="fas fa-square"></i> {{ $jugador->tarjetas_rojas }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-gray-700">
                                    <i class="fas fa-futbol text-green-500"></i> {{ $jugador->goles }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Botones flotantes -->
        <div class="fixed bottom-4 right-4 space-y-4">
            <a href="{{ route('admin.equipos.create', ['torneoId' => $torneo->id]) }}" class="bg-gradient-to-r from-green-400 to-green-600 text-white p-5 rounded-full shadow-lg hover:from-green-500 hover:to-green-700 transition-colors duration-300 flex items-center justify-center">
                <i class="fas fa-plus text-2xl"></i>
                <span class="sr-only">Crear Equipo</span>
            </a>
            <a href="{{ route('admin.equipos.index', ['torneoId' => $torneo->id]) }}" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white p-5 rounded-full shadow-lg hover:from-blue-500 hover:to-blue-700 transition-colors duration-300 flex items-center justify-center">
                <i class="fas fa-cog text-2xl"></i>
                <span class="sr-only">Configurar Equipos</span>
            </a>
        </div>
    </div>

    <script>
        function togglePlayers(teamId) {
            const playersDiv = document.getElementById('players-' + teamId);
            playersDiv.classList.toggle('hidden');
        }
    </script>
@endsection
