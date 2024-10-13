@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4 font-weight-bold text-primary" style="font-size: 2.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">Equipos</h1>

    <div class="text-right mb-3">
        <a href="{{ route('teams.create', ['torneo' => $torneo->id]) }}" class="btn btn-success btn-lg rounded-pill shadow">
            <i class="fas fa-plus-circle"></i> Agregar Equipo
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Coach</th>
                    <th>Torneo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipos as $equipo)
                    <tr>
                        <td>{{ $equipo->name }}</td>
                        <td>{{ $equipo->coach }}</td>
                        <td>{{ $equipo->torneo->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Acciones">
                                <a href="{{ route('teams.edit', ['torneo' => $equipo->torneo_id, 'equipo' => $equipo->id]) }}" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('teams.destroy', ['torneo' => $equipo->torneo_id, 'equipo' => $equipo->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm ml-2" onclick="return confirm('¿Está seguro de que desea eliminar este equipo?')">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay equipos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
