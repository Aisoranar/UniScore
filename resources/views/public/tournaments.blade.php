@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Torneos</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Deporte</th>
                <th>Tipo</th>
                <th>Número de Equipos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($torneos as $torneo)
            <tr>
                <td>{{ $torneo->name }}</td>
                <td>{{ $torneo->sport_type }}</td>
                <td>{{ $torneo->tournament_type }}</td>
                <td>{{ $torneo->number_of_teams }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
