@extends('layouts.app')

@section('content')
<h1>Agregar Equipo a {{ $torneo->name }}</h1>

<form action="{{ route('teams.store', $torneo) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre del Equipo</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="coach">Nombre del Coach</label>
        <input type="text" name="coach" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
