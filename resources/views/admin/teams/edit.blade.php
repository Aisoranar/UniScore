@extends('layouts.app')

@section('content')
<h1>Editar Equipo: {{ $equipo->name }}</h1>

<form action="{{ route('teams.update', ['torneo' => $torneo->id, 'equipo' => $equipo->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre del Equipo</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $equipo->name) }}" required>
    </div>
    <div class="form-group">
        <label for="coach">Nombre del Coach</label>
        <input type="text" name="coach" class="form-control" value="{{ old('coach', $equipo->coach) }}">
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection
