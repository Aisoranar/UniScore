@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Lista de Torneos</h1>

    @auth
        @if(auth()->user()->role === 'superadmin')
            <div class="text-center mb-4">
                <a href="{{ route('tournaments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Crear Torneo
                </a>
            </div>
        @endif
    @endauth

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Deporte</th>
                    <th>Tipo de Torneo</th>
                    <th>Número de Equipos</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($torneos as $torneo)
                    <tr>
                        <td>{{ $torneo->name }}</td>
                        <td>{{ $torneo->sport_type }}</td>
                        <td>{{ $torneo->tournament_type }}</td>
                        <td>{{ $torneo->number_of_teams }}</td>
                        <td>{{ $torneo->start_date->format('d/m/Y') }}</td>
                        <td>{{ $torneo->end_date->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('tournaments.show', $torneo->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            @auth
                                @if(auth()->user()->role === 'superadmin')
                                    <a href="{{ route('tournaments.edit', $torneo->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('tournaments.destroy', $torneo->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este torneo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay torneos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
