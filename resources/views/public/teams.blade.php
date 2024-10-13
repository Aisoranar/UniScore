@extends('layouts.app')

@section('content')
    <h1>Equipos</h1>
    <ul>
        @foreach($teams as $team)
            <li>{{ $team->name }} - Torneo: {{ $team->torneo->name }}</li>
        @endforeach
    </ul>
@endsection
