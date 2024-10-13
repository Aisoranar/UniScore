@extends('layouts.app')

@section('content'){{ dd($partido) }}

<h1>Estadísticas del Partido: {{ $partido->equipoLocal->name ?? 'Equipo Local no disponible' }} vs {{ $partido->equipoVisitante->name ?? 'Equipo Visitante no disponible' }}</h1>
<a href="{{ route('matches.statistics.create', ['match' => $partido->id]) }}" class="btn btn-primary">Agregar Estadística</a>

<table class="table">
    <thead>
        <tr>
            <th>Jugador</th>
            <th>Goles</th>
            <th>Tarjetas Amarillas</th>
            <th>Tarjetas Rojas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estadisticas as $estadistica)
            <tr>
                <td>{{ $estadistica->jugador ? $estadistica->jugador->name : 'Jugador no disponible' }}</td>
                <td>{{ $estadistica->goals }}</td>
                <td>{{ $estadistica->yellow_cards }}</td>
                <td>{{ $estadistica->red_cards }}</td>
                <td>
                    <a href="{{ route('statistics.edit', $estadistica) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('statistics.destroy', $estadistica) }}" method="POST" style="display: inline-block;">
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
