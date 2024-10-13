@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Partidos</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Lugar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidos as $partido)
            <tr>
                <td>{{ $partido->equipoLocal->name }}</td>
                <td>{{ $partido->equipoVisitante->name }}</td>
                <td>{{ $partido->match_date }}</td>
                <td>{{ $partido->match_time }}</td>
                <td>{{ $partido->location }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
