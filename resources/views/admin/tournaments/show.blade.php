@extends('layouts.app')

@section('content')
<h1>{{ $torneo->name }}</h1>
<p>Deporte: {{ $torneo->sport_type }}</p>
<p>Tipo de Torneo: {{ $torneo->tournament_type }}</p>
<p>Número de Equipos: {{ $torneo->number_of_teams }}</p>
<p>Fecha de Inicio: {{ $torneo->start_date }}</p>
<p>Fecha de Finalización: {{ $torneo->end_date }}</p>

<h2>Equipos</h2>
<ul>
    @foreach($torneo->equipos as $equipo)
        <li>{{ $equipo->name }}</li>
    @endforeach
</ul>

<h2>Partidos</h2>
<ul>
    @foreach($torneo->partidos as $partido)
        <li>{{ $partido->equipoLocal->name }} vs {{ $partido->equipoVisitante->name }} - {{ $partido->match_date }}</li>
    @endforeach
</ul>
@endsection
