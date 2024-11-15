@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Editar Equipo</h2>
    <form action="{{ route('admin.teams.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del Equipo</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" required>
        </div>
        <div class="form-group">
            <label for="torneo_id">Torneo</label>
            <select class="form-control" id="torneo_id" name="torneo_id" required>
                @foreach($torneos as $torneo)
                    <option value="{{ $torneo->id }}" {{ $team->torneo_id == $torneo->id ? 'selected' : '' }}>
                        {{ $torneo->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="coach">Entrenador</label>
            <input type="text" class="form-control" id="coach" name="coach" value="{{ $team->coach }}">
        </div>
        <button type="submit" class="btn btn-success mt-3">Actualizar</button>
    </form>
</div>
@endsection
