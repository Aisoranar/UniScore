@extends('layouts.app')

@section('content')
<h1>Equipos</h1>

<a href="{{ route('teams.create', ['torneo' => $torneo->id]) }}" class="btn btn-primary">Agregar Equipo</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Coach</th>
            <th>Torneo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
            <tr>
                <td>{{ $equipo->name }}</td>
                <td>{{ $equipo->coach }}</td>
                <td>{{ $equipo->torneo->name }}</td>
                <td>
                    <a href="{{ route('teams.edit', ['torneo' => $equipo->torneo_id, 'equipo' => $equipo->id]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('teams.destroy', ['torneo' => $equipo->torneo_id, 'equipo' => $equipo->id]) }}" method="POST" style="display: inline-block;">
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
