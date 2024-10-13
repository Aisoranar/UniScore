@extends('layouts.app')

@section('content')
<h1>Agregar Estadística para el Partido: {{ $partido->equipoLocal->name }} vs {{ $partido->equipoVisitante->name }}</h1>

<form action="{{ route('matches.statistics.store', $partido->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="jugador_id">Jugador</label>
        <select name="jugador_id" class="form-control" required>
            @foreach($jugadores as $jugador)
                <option value="{{ $jugador->id }}">{{ $jugador->name }} ({{ $jugador->equipo->name }})</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="goals">Goles</label>
        <input type="number" name="goals" class="form-control" value="0" required>
    </div>
    <div class="form-group">
        <label for="yellow_cards">Tarjetas Amarillas</label>
        <input type="number" name="yellow_cards" class="form-control" value="0" required>
    </div>
    <div class="form-group">
        <label for="red_cards">Tarjetas Rojas</label>
        <input type="number" name="red_cards" class="form-control" value="0" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
