@extends('layouts.app')

@section('content')
    <h1>Resultados</h1>
    <ul>
        @foreach($results as $result)
            <li>
                {{ $result->equipoLocal->name }} {{ $result->local_score }} - {{ $result->visitor_score }} {{ $result->equipoVisitante->name }}
                - Torneo: {{ $result->torneo->name }}
            </li>
        @endforeach
    </ul>
@endsection
