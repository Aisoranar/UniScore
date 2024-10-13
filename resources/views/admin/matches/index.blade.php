@extends('layouts.app')

@section('content')
<h1>Partidos de {{ $torneo->name }}</h1>
<a href="{{ route('tournaments.matches.create', ['tournament' => $torneo->id]) }}" class="btn btn-primary">Programar Partido</a>

<table class="table">
    <thead>
        <tr>
            <th>Equipo Local</th>
            <th>Equipo Visitante</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Lugar</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($partidos as $partido)
            <tr>
                <td>{{ $partido->equipoLocal->name }}</td>
                <td>{{ $partido->equipoVisitante->name }}</td>
                <td>{{ $partido->match_date }}</td>
                <td>{{ $partido->match_time }}</td>
                <td>{{ $partido->location }}</td>
                <td>
                    <a href="{{ route('tournaments.matches.edit', ['tournament' => $torneo->id, 'match' => $partido->id]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('tournaments.matches.destroy', ['tournament' => $torneo->id, 'match' => $partido->id]) }}" method="POST" style="display: inline-block;">
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
