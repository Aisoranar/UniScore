@extends('layouts.app')

@section('content')
<h1>Editar Partido</h1>

<form action="{{ route('tournaments.matches.update', ['tournament' => $tournament->id, 'match' => $partido->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="equipo_local_id">Equipo Local</label>
        <select name="equipo_local_id" class="form-control" required>
            @foreach($tournament->equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ $equipo->id == $partido->equipo_local_id ? 'selected' : '' }}>
                    {{ $equipo->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="equipo_visitante_id">Equipo Visitante</label>
        <select name="equipo_visitante_id" class="form-control" required>
            @foreach($tournament->equipos as $equipo)
                <option value="{{ $equipo->id }}" {{ $equipo->id == $partido->equipo_visitante_id ? 'selected' : '' }}>
                    {{ $equipo->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="fecha">Fecha del Partido</label>
        <input type="date" name="fecha" value="{{ $partido->match_date }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="hora">Hora del Partido</label>
        <input type="time" name="hora" value="{{ $partido->match_time }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="ubicacion">Ubicación del Partido</label>
        <input type="text" name="ubicacion" value="{{ $partido->location }}" class="form-control" placeholder="Ingrese la ubicación">
    </div>
    <button type="submit" class="btn btn-success">Actualizar Partido</button>
    <a href="{{ route('tournaments.matches.index', ['tournament' => $tournament->id]) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
