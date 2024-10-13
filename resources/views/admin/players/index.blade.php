@extends('layouts.app')

@section('content')
<h1>Jugadores del Equipo: {{ $equipo->name }}</h1>
<a href="{{ route('players.create', ['torneo' => $torneo->id, 'equipo' => $equipo->id]) }}" class="btn btn-primary">Agregar Jugador</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Número</th>
            <th>Posición</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jugadores as $jugador)
            <tr>
                <td>{{ $jugador->name }}</td>
                <td>{{ $jugador->number }}</td>
                <td>{{ $jugador->position }}</td>
                <td>
                    <a href="{{ route('players.edit', ['torneo' => $torneo->id, 'equipo' => $equipo->id, 'jugador' => $jugador->id]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('players.destroy', ['torneo' => $torneo->id, 'equipo' => $equipo->id, 'jugador' => $jugador->id]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
