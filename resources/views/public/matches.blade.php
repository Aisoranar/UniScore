@extends('layouts.app')

@section('content')
    <h1>Partidos</h1>
    <ul>
        @foreach($matches as $match)
            <li>
                {{ $match->equipoLocal->name }} vs {{ $match->equipoVisitante->name }} 
                - Torneo: {{ $match->torneo->name }} 
                - Fecha: {{ $match->match_date }} 
                - Hora: {{ $match->match_time }}
            </li>
        @endforeach
    </ul>
@endsection
