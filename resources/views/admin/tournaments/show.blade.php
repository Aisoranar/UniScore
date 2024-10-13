@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
    <div class="bg-blue-500 text-white p-4 rounded-t-lg">
        <h1 class="text-3xl font-extrabold text-center">{{ $torneo->name }}</h1>
        <p class="text-md text-center mt-1">{{ $torneo->sport_type }}</p>
    </div>
    <div class="p-4">
        <p class="text-sm mb-2"><strong>Tipo de torneo:</strong> {{ $torneo->tournament_type }}</p>
        <p class="text-sm mb-2"><strong>Fecha de inicio:</strong> {{ \Carbon\Carbon::parse($torneo->start_date)->format('d/m/Y') }}</p>
        <p class="text-sm mb-4"><strong>Fecha de fin:</strong> {{ \Carbon\Carbon::parse($torneo->end_date)->format('d/m/Y') }}</p>

        <h3 class="text-lg font-semibold mb-2">Equipos Registrados ({{ $torneo->equipos->count() }} / {{ $torneo->number_of_teams }})</h3>
        @if($torneo->equipos->count() < $torneo->number_of_teams)
            <p class="text-sm text-yellow-600">Aún faltan {{ $torneo->number_of_teams - $torneo->equipos->count() }} equipos para completar el torneo.</p>
        @else
            <p class="text-sm text-green-600">¡El torneo está lleno!</p>
        @endif

        <ul class="list-disc list-inside mb-4">
            @if($torneo->equipos->isEmpty())
                <li>No hay equipos registrados en este torneo.</li>
            @else
                @foreach($torneo->equipos as $equipo)
                    <li class="mb-2">
                        <strong>{{ $equipo->name }}</strong> ({{ $equipo->jugadores->count() }} jugadores)
                        <ul class="list-disc list-inside ml-4 text-sm">
                            @foreach($equipo->jugadores as $jugador)
                                <li>{{ $jugador->name }} - {{ $jugador->position }} - #{{ $jugador->number }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
            <ul class="list-disc list-inside text-sm">
                @foreach($torneo->partidos as $partido)
                    <li>
                        @if($partido->equipo_local && $partido->equipo_visitante)
                            {{ $partido->equipo_local->name }} vs {{ $partido->equipo_visitante->name }} - {{ $partido->match_date }} {{ $partido->match_time }}
                        @else
                            Partido no tiene equipos asignados.
                        @endif
                    </li>
                @endforeach
            </ul>
            
    </div>
</div>
@endsection
