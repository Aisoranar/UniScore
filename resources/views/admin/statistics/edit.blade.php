@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Estadística</h1>
    <form action="{{ route('statistics.update', $estadistica->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="jugador_id">Jugador</label>
            <select name="jugador_id" id="jugador_id" class="form-control">
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}" {{ $jugador->id == $estadistica->jugador_id ? 'selected' : '' }}>
                        {{ $jugador->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="partido_id">Partido</label>
            <select name="partido_id" id="partido_id" class="form-control">
                @foreach($partidos as $partido)
                    <option value="{{ $partido->id }}" {{ $partido->id == $estadistica->partido_id ? 'selected' : '' }}>
                        Partido #{{ $partido->id }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="goals">Goles</label>
            <input type="number" name="goals" id="goals" class="form-control" value="{{ $estadistica->goals }}">
        </div>
        <div class="form-group">
            <label for="yellow_cards">Tarjetas Amarillas</label>
            <input type="number" name="yellow_cards" id="yellow_cards" class="form-control" value="{{ $estadistica->yellow_cards }}">
        </div>
        <div class="form-group">
            <label for="red_cards">Tarjetas Rojas</label>
            <input type="number" name="red_cards" id="red_cards" class="form-control" value="{{ $estadistica->red_cards }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
