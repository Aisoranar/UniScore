@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estadísticas</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jugador</th>
                <th>Equipo</th>
                <th>Goles</th>
                <th>Tarjetas Amarillas</th>
                <th>Tarjetas Rojas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estadisticas as $estadistica)
            <tr>
                <td>{{ $estadistica->jugador->name }}</td>
                <td>{{ $estadistica->jugador->equipo->name }}</td>
                <td>{{ $estadistica->goals }}</td>
                <td>{{ $estadistica->yellow_cards }}</td>
                <td>{{ $estadistica->red_cards }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
