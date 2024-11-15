@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Crear Nuevo Equipo</h2>
    <form action="{{ route('admin.teams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Equipo</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del equipo" required>
        </div>
        <div class="form-group">
            <label for="torneo_id">Torneo</label>
            <select class="form-control" id="torneo_id" name="torneo_id" required>
                @foreach($torneos as $torneo)
                    <option value="{{ $torneo->id }}">{{ $torneo->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="coach">Entrenador</label>
            <input type="text" class="form-control" id="coach" name="coach" placeholder="Nombre del entrenador">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection
