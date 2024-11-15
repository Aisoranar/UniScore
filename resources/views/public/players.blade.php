@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jugadores</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Número</th>
                <th>Posición</th>
                <th>Equipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jugadores as $jugador)
            <tr>
                <td>{{ $jugador->name }}</td>
                <td>{{ $jugador->number }}</td>
                <td>{{ $jugador->position }}</td>
                <td>{{ $jugador->equipo->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
