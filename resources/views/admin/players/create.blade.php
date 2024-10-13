@extends('layouts.app')

@section('content')
<h1>Agregar Jugador</h1>

<form action="{{ route('players.store', ['torneoId' => $torneo->id, 'equipoId' => $equipo->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre del Jugador</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="number">Número</label>
        <input type="number" name="number" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="position">Posición</label>
        <select name="position" class="form-control" required>
            <option value="Portero">Portero</option>
            <option value="Defensa">Defensa</option>
            <option value="Centrocampista">Centrocampista</option>
            <option value="Delantero">Delantero</option>
        </select>
    </div>
    <div class="form-group">
        <label for="equipo_id">Equipo</label>
        <select name="equipo_id" class="form-control" required>
            @foreach($equipos as $eq)
                <option value="{{ $eq->id }}">{{ $eq->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>

@endsection
