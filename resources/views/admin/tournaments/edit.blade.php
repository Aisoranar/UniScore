@extends('layouts.app')

@section('content')
<h1>Editar Torneo: {{ $torneo->name }}</h1>

<form action="{{ route('tournaments.update', $torneo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $torneo->name) }}" required>
    </div>

    <div class="form-group">
        <label for="sport_type">Deporte</label>
        <input type="text" name="sport_type" class="form-control" value="{{ old('sport_type', $torneo->sport_type) }}" required>
    </div>

    <div class="form-group">
        <label for="tournament_type">Tipo de Torneo</label>
        <input type="text" name="tournament_type" class="form-control" value="{{ old('tournament_type', $torneo->tournament_type) }}" required>
    </div>

    <div class="form-group">
        <label for="number_of_teams">Número de Equipos</label>
        <input type="number" name="number_of_teams" class="form-control" value="{{ old('number_of_teams', $torneo->number_of_teams) }}" required>
    </div>

    <div class="form-group">
        <label for="start_date">Fecha de Inicio</label>
        <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $torneo->start_date) }}" required>
    </div>

    <div class="form-group">
        <label for="end_date">Fecha de Finalización</label>
        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $torneo->end_date) }}" required>
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection
