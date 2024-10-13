{{-- Verificar los datos que llegan a la vista --}}
@dd($partido, $estadisticas, $jugadores)

@extends('layouts.app')

@section('content')
    <h1>
        Estadísticas del Partido: 
        {{ $partido->equipoLocal->name ?? 'Equipo Local no disponible' }} 
        vs 
        {{ $partido->equipoVisitante->name ?? 'Equipo Visitante no disponible' }}
    </h1>

    {{-- Botón para agregar una nueva estadística --}}
    @if(isset($partido) && $partido->id)
        <a href="{{ route('matches.statistics.create', ['match' => $partido->id]) }}" class="btn btn-primary mb-3">Agregar Estadística</a>
    @else
        <p>No se puede agregar una estadística porque no hay un partido disponible.</p>
    @endif

    {{-- Mostrar los jugadores disponibles para agregar estadísticas --}}
    @if($jugadores->isNotEmpty())
        <h2>Jugadores disponibles:</h2>
        <ul>
            @foreach($jugadores as $jugador)
                <li>{{ $jugador->name }} ({{ $jugador->equipo->name }})</li>
            @endforeach
        </ul>
    @else
        <p>No hay jugadores disponibles para este partido.</p>
    @endif

    {{-- Verificar si existen estadísticas para mostrar --}}
    @if($estadisticas->isNotEmpty())
        <h2>Estadísticas del partido:</h2>
        <table class="table table-striped">
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
                            {{-- Botón para editar la estadística --}}
                            <a href="{{ route('statistics.edit', ['partido' => $partido->id, 'estadistica' => $estadistica->id]) }}" class="btn btn-warning">Editar</a>

                            {{-- Formulario para eliminar la estadística --}}
                            <form action="{{ route('statistics.destroy', ['partido' => $partido->id, 'estadistica' => $estadistica->id]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay estadísticas disponibles para este partido.</p>
    @endif
@endsection
