@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Listado de Equipos</h2>
    <a href="{{ route('admin.teams.create') }}" class="btn btn-primary mb-3">Crear Nuevo Equipo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Torneo</th>
                <th>Entrenador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->torneo->name }}</td>
                <td>{{ $team->coach }}</td>
                <td>
                    <a href="{{ route('admin.teams.show', $team->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este equipo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
