@extends('layouts.app')

@section('content')
    @if(isset($torneo))
        <h1>Partidos de {{ $torneo->name }}</h1>
        <a href="{{ route('tournaments.matches.create', ['tournament' => $torneo->id]) }}" class="btn btn-primary">Programar Partido</a>
    @else
        <h1>Torneo no especificado</h1>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
            @if(isset($partidos) && count($partidos) > 0)
                @foreach($partidos as $partido)
                    <tr>
                        <td>{{ $partido->equipoLocal->name }}</td>
                        <td>{{ $partido->equipoVisitante->name }}</td>
                        <td>{{ $partido->match_date }}</td>
                        <td>{{ $partido->match_time }}</td>
                        <td>{{ $partido->location }}</td>
                        <td>
                            @if(isset($torneo))
                                <a href="{{ route('tournaments.matches.edit', ['tournament' => $torneo->id, 'match' => $partido->id]) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('tournaments.matches.destroy', ['tournament' => $torneo->id, 'match' => $partido->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No hay partidos disponibles.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
