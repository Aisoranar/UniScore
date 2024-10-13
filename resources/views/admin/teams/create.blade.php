@extends('layouts.app')

@section('content')
<h1>Agregar Equipo</h1>

<form action="{{ route('teams.store', ['torneo' => $torneo->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="torneo_id">Seleccionar Torneo</label>
        <select name="torneo_id" class="form-control" required>
            <option value="">Seleccione un torneo</option>
            @foreach($torneos as $tournament)
                <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Nombre del Equipo</label>
        <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre del equipo" required>
    </div>
    <div class="form-group">
        <label for="coach">Nombre del Coach</label>
        <input type="text" name="coach" class="form-control" placeholder="Ingrese el nombre del coach">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
