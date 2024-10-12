@extends('layouts.app')

@section('content')
<h1>Lista de Torneos</h1>
<a href="{{ route('tournaments.create') }}" class="btn btn-primary">Crear Torneo</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Deporte</th>
            <th>Tipo</th>
            <th>Número de Equipos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($torneos as $torneo)
            <tr>
                <td>{{ $torneo->name }}</td>
                <td>{{ $torneo->sport_type }}</td>
                <td>{{ $torneo->tournament_type }}</td>
                <td>{{ $torneo->number_of_teams }}</td>
                <td>
                    <a href="{{ route('tournaments.show', $torneo) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('tournaments.edit', $torneo) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('tournaments.destroy', $torneo) }}" method="POST" style="display: inline-block;">
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
