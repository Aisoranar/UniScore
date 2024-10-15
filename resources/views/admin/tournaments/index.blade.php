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

    <div class="table-responsive mt-4">
        <table class="table table-striped">
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
                            
                                <a href="{{ route('tournaments.show', $torneo) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            @auth    
                                @if(auth()->user()->role === 'superadmin')
                                    <a href="{{ route('tournaments.edit', $torneo) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('tournaments.destroy', $torneo) }}" method="POST" style="display: inline-block;">
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
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
