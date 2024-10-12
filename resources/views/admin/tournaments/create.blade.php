@extends('layouts.app')

@section('content')
<h1>Crear Torneo</h1>

<form action="{{ route('tournaments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="sport_type">Deporte</label>
        <input type="text" name="sport_type" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tournament_type">Tipo de Torneo</label>
        <input type="text" name="tournament_type" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="number_of_teams">Número de Equipos</label>
        <input type="number" name="number_of_teams" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="start_date">Fecha de Inicio</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="end_date">Fecha de Finalización</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
