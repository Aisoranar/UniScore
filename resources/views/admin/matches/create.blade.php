@extends('layouts.app')

@section('content')
<h1>Programar Partido para {{ $torneo->name }}</h1>

<form action="{{ route('matches.store', $torneo) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="equipo_local_id">Equipo Local</label>
        <select name="equipo_local_id" class="form-control" required>
            @foreach($torneo->equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="equipo_visitante_id">Equipo Visitante</label>
        <select name="equipo_visitante_id" class="form-control" required>
            @foreach($torneo->equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="match_date">Fecha del Partido</label>
        <input type="date" name="match_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="match_time">Hora del Partido</label>
        <input type="time" name="match_time" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="location">Lugar</label>
        <input type="text" name="location" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection
