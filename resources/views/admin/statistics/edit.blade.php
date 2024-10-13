@extends('layouts.app')

@section('content')
<h1>Editar Estadística del Jugador: {{ $estadistica->jugador->name }}</h1>

<form action="{{ route('matches.statistics.update', ['match' => $partido->id, 'estadistica' => $estadistica->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="jugador_id">Jugador</label>
        <select name="jugador_id" class="form-control" required>
            @foreach($jugadores as $jugador)
                <option value="{{ $jugador->id }}" {{ $jugador->id == $estadistica->jugador_id ? 'selected' : '' }}>
                    {{ $jugador->name }} ({{ $jugador->equipo->name }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="goals">Goles</label>
        <input type="number" name="goals" class="form-control" value="{{ $estadistica->goals }}" required>
    </div>
    <div class="form-group">
        <label for="yellow_cards">Tarjetas Amarillas</label>
        <input type="number" name="yellow_cards" class="form-control" value="{{ $estadistica->yellow_cards }}" required>
    </div>
    <div class="form-group">
        <label for="red_cards">Tarjetas Rojas</label>
        <input type="number" name="red_cards" class="form-control" value="{{ $estadistica->red_cards }}" required>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection
