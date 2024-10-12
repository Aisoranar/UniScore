@extends('layouts.app')

@section('content')
<h1>Editar Partido</h1>

<form action="{{ route('matches.update', $partido) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="equipo_local_id">Equipo Local</label>
        <select name="equipo_local_id" class="form-control" required>
            @foreach($torneo->equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ $equipo->id == $partido->equipo_local_id ? 'selected' : '' }}>
                    {{ $equipo->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="equipo_visitante_id">Equipo Visitante</label>
        <select name="equipo_visitante_id" class="form-control" required>
            @foreach($torneo->equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ $equipo->id == $partido->equipo_visitante_id ? 'selected' : '' }}>
                    {{ $equipo->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="match_date">Fecha del Partido</label>
        <input type="date" name="match_date" class="form-control" value="{{ $partido->match_date }}" required>
    </div>
    <div class="form-group">
        <label for="match_time">Hora del Partido</label>
        <input type="time" name="match_time" class="form-control" value="{{ $partido->match_time }}" required>
    </div>
    <div class="form-group">
        <label for="location">Lugar</label>
        <input type="text" name="location" class="form-control" value="{{ $partido->location }}">
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
@endsection
