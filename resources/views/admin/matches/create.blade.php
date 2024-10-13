@extends('layouts.app')

@section('content')
<h1>Programar Partido para {{ $tournament->name }}</h1>

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form action="{{ route('tournaments.matches.store', $tournament->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="equipo_local_id">Equipo Local</label>
        <select name="equipo_local_id" class="form-control" required>
            <option value="">Seleccione un equipo local</option>
            @foreach($tournament->equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="equipo_visitante_id">Equipo Visitante</label>
        <select name="equipo_visitante_id" class="form-control" required>
            <option value="">Seleccione un equipo visitante</option>
            @foreach($tournament->equipos as $equipo)
                <option value="{{ $equipo->id }}">{{ $equipo->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha del Partido</label>
        <input type="date" name="fecha" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="hora">Hora del Partido</label>
        <input type="time" name="hora" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="ubicacion">Ubicación del Partido</label>
        <input type="text" name="ubicacion" class="form-control" placeholder="Ingrese la ubicación" required>
    </div>

    <button type="submit" class="btn btn-success">Guardar Partido</button>
    <a href="{{ route('tournaments.show', $tournament->id) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
