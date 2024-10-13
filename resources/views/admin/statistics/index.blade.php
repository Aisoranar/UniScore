@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4 font-weight-bold text-primary" style="font-size: 2.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">Estadísticas de Torneos</h1>

    @foreach ($estadisticas as $partidoId => $estadisticasPartido)
        <div class="card mt-3 shadow-sm rounded border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">
                    <i class="fas fa-futbol"></i>
                    Partido: 
                    {{ $estadisticasPartido->first()->partido->equipoLocal->name ?? 'Equipo Local No Disponible' }} 
                    vs 
                    {{ $estadisticasPartido->first()->partido->equipoVisitante->name ?? 'Equipo Visitante No Disponible' }}
                </h3>
                <a href="{{ route('statistics.create') }}" class="btn btn-success btn-sm rounded-pill shadow">
                    <i class="fas fa-plus-circle"></i> Agregar Estadística
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive d-none d-md-block"> <!-- Muestra tabla solo en pantallas grandes -->
                    <table class="table table-bordered table-striped text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Jugador</th>
                                <th>Equipo</th>
                                <th>Goles</th>
                                <th>Tarjetas Amarillas</th>
                                <th>Tarjetas Rojas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($estadisticasPartido->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No hay estadísticas disponibles para este partido.</td>
                                </tr>
                            @else
                                @php
                                    $maxGoals = $estadisticasPartido->max('goals'); // Encuentra el máximo de goles
                                @endphp
                                @foreach ($estadisticasPartido as $estadistica)
                                    <tr>
                                        <td>
                                            {{ $estadistica->jugador->name ?? 'Jugador No Disponible' }}
                                            @if ($estadistica->goals == $maxGoals)
                                                <span class="badge badge-warning ml-2" style="background-color: orange; color: white; font-weight: bold;">Goleador</span>
                                            @endif
                                        </td>
                                        <td>{{ $estadistica->jugador->equipo->name ?? 'Equipo No Disponible' }}</td>
                                        <td>
                                            <span class="font-weight-bold">{{ $estadistica->goals }}</span>
                                            <i class="fas fa-golf-ball text-success"></i>
                                        </td>
                                        <td>
                                            <span class="font-weight-bold">{{ $estadistica->yellow_cards }}</span>
                                            <i class="fas fa-exclamation-triangle text-warning"></i>
                                        </td>
                                        <td>
                                            <span class="font-weight-bold">{{ $estadistica->red_cards }}</span>
                                            <i class="fas fa-ban text-danger"></i>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <a href="{{ route('statistics.edit', $estadistica->id) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Editar
                                                </a>
                                                <form action="{{ route('statistics.destroy', $estadistica->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-2" onclick="return confirm('¿Está seguro de que desea eliminar esta estadística?')">
                                                        <i class="fas fa-trash-alt"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Vista de tarjetas para dispositivos móviles -->
                <div class="d-md-none"> <!-- Solo se muestra en pantallas pequeñas -->
                    @if ($estadisticasPartido->isEmpty())
                        <div class="alert alert-info text-center">No hay estadísticas disponibles para este partido.</div>
                    @else
                        @php
                            $maxGoals = $estadisticasPartido->max('goals'); // Encuentra el máximo de goles
                        @endphp
                        @foreach ($estadisticasPartido as $estadistica)
                            <div class="card mb-3 shadow-sm border-0">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $estadistica->jugador->name ?? 'Jugador No Disponible' }}
                                        @if ($estadistica->goals == $maxGoals)
                                            <span class="badge badge-warning ml-2" style="background-color: orange; color: white; font-weight: bold;">Goleador</span>
                                        @endif
                                    </h5>
                                    <p class="card-text">
                                        <strong>Equipo:</strong> {{ $estadistica->jugador->equipo->name ?? 'Equipo No Disponible' }} <br>
                                        <strong>Goles:</strong> <span class="font-weight-bold">{{ $estadistica->goals }}</span> <i class="fas fa-golf-ball text-success"></i> <br>
                                        <strong>Tarjetas Amarillas:</strong> <span class="font-weight-bold">{{ $estadistica->yellow_cards }}</span> <i class="fas fa-exclamation-triangle text-warning"></i> <br>
                                        <strong>Tarjetas Rojas:</strong> <span class="font-weight-bold">{{ $estadistica->red_cards }}</span> <i class="fas fa-ban text-danger"></i>
                                    </p>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <a href="{{ route('statistics.edit', $estadistica->id) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('statistics.destroy', $estadistica->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm ml-2" onclick="return confirm('¿Está seguro de que desea eliminar esta estadística?')">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
