@extends('layouts.app')

@section('content')
<h1>Editar Jugador: {{ $jugador->name }}</h1>

<form action="{{ route('players.update', $jugador) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre del Jugador</label>
        <input type="text" name="name" class="form-control" value="{{ $jugador->name }}" required>
    </div>
    <div class="form-group">
        <label for="number">Número</label>
        <input type="number" name="number" class="form-control" value="{{ $jugador->number }}" required>
    </div>
    <div class="form-group">
        <label for="position">Posición</label>
        <select name="position" class="form-control" required>
            <option value="Portero" {{ $jugador->position == 'Portero' ? 'selected' : '' }}>Portero</option>
            <option value="Defensa" {{ $jugador->position == 'Defensa' ? 'selected' : '' }}>Defensa</option>
            <option value="Centrocampista" {{ $jugador->position == 'Centrocampista' ? 'selected' : '' }}>Centrocampista</option>
            <option value="Delantero" {{ $jugador->position == 'Delantero' ? 'selected' : '' }}>Delantero</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection
