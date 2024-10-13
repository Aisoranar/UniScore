@extends('layouts.app')

@section('content')
<h1>Equipos de {{ $torneo->name }}</h1>
<a href="{{ route('teams.create', $torneo) }}" class="btn btn-primary">Agregar Equipo</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Coach</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
            <tr>
                <td>{{ $equipo->name }}</td>
                <td>{{ $equipo->coach }}</td>
                <td>
                    <a href="{{ route('teams.edit', ['torneo' => $torneo->id, 'equipo' => $equipo->id]) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('teams.destroy', ['torneo' => $torneo->id, 'equipo' => $equipo->id]) }}" method="POST" style="display: inline-block;">
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
