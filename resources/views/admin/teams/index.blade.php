@extends('layouts.app')

@section('content')
<h1>Lista de Equipos y Torneos</h1> {{-- Título general, no atado a un torneo específico --}}

<table class="table">
    <thead>
        <tr>
            <th>Nombre del Equipo</th>
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
                <td>{{ $equipo->torneo->name ?? 'Torneo no especificado' }}</td> {{-- Mostrar el nombre del torneo asociado --}}
                <td>
                    {{-- Acciones solo visibles para superadmin --}}
                    @if(Auth::user() && Auth::user()->hasRole('superadmin'))
                        <a href="{{ route('teams.edit', ['torneo' => $equipo->torneo_id, 'equipo' => $equipo->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('teams.destroy', ['torneo' => $equipo->torneo_id, 'equipo' => $equipo->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
