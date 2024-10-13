@extends('layouts.app')

@section('content')
    <h1>Estadísticas</h1>
    <ul>
        @foreach($statistics as $stat)
            <li>
                Jugador: {{ $stat->jugador->name }} - Partido: {{ $stat->partido->equipoLocal->name }} vs {{ $stat->partido->equipoVisitante->name }}
                - Goles: {{ $stat->goals }} - Amarillas: {{ $stat->yellow_cards }} - Rojas: {{ $stat->red_cards }}
            </li>
        @endforeach
    </ul>
@endsection
