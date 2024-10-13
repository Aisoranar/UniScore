@extends('layouts.app')

@section('content')
<h1>{{ $torneo->name }}</h1>
<p>Tipo de deporte: {{ $torneo->sport_type }}</p>
<p>Tipo de torneo: {{ $torneo->tournament_type }}</p>
<p>Fecha de inicio: {{ $torneo->start_date }}</p>
<p>Fecha de fin: {{ $torneo->end_date }}</p>

<h3>Equipos Registrados ({{ $torneo->equipos->count() }} / {{ $torneo->number_of_teams }})</h3>
@if($equiposRestantes > 0)
    <p>Aún faltan {{ $equiposRestantes }} equipos para completar el torneo.</p>
@else
    <p>¡El torneo está lleno!</p>
@endif

<ul>
    @foreach($torneo->equipos as $equipo)
        <li>{{ $equipo->name }} ({{ $equipo->jugadores->count() }} jugadores)
            <ul>
                @foreach($equipo->jugadores as $jugador)
                    <li>{{ $jugador->name }} - {{ $jugador->position }} - #{{ $jugador->number }}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>

<h3>Partidos</h3>
<ul>
    @foreach($torneo->partidos as $partido)
        <li>{{ $partido->equipo_local->name }} vs {{ $partido->equipo_visitante->name }} - {{ $partido->match_date }} {{ $partido->match_time }}</li>
    @endforeach
</ul>
@endsection
