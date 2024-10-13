@extends('layouts.app')

@section('content')
    <h1>Jugadores</h1>
    <ul>
        @foreach($players as $player)
            <li>{{ $player->name }} - Equipo: {{ $player->equipo->name }}</li>
        @endforeach
    </ul>
@endsection
