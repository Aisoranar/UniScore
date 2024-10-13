@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Estadística</h1>
    <form action="{{ route('statistics.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jugador_id">Jugador</label>
            <select name="jugador_id" id="jugador_id" class="form-control">
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}">{{ $jugador->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="partido_id">Partido</label>
            <select name="partido_id" id="partido_id" class="form-control">
                @foreach($partidos as $partido)
                    <option value="{{ $partido->id }}">Partido #{{ $partido->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="goals">Goles</label>
            <input type="number" name="goals" id="goals" class="form-control">
        </div>
        <div class="form-group">
            <label for="yellow_cards">Tarjetas Amarillas</label>
            <input type="number" name="yellow_cards" id="yellow_cards" class="form-control">
        </div>
        <div class="form-group">
            <label for="red_cards">Tarjetas Rojas</label>
            <input type="number" name="red_cards" id="red_cards" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
