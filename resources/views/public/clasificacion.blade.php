<!-- resources/views/public/clasificacion.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Clasificación</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Equipo</th>
                <th>PJ</th>
                <th>PG</th>
                <th>PE</th>
                <th>PP</th>
                <th>GF</th>
                <th>GC</th>
                <th>+/-</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clasificacion as $index => $equipo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->partidos_jugados }}</td>
                    <td>{{ $equipo->partidos_ganados }}</td>
                    <td>{{ $equipo->partidos_empatados }}</td>
                    <td>{{ $equipo->partidos_perdidos }}</td>
                    <td>{{ $equipo->goles_favor }}</td>
                    <td>{{ $equipo->goles_contra }}</td>
                    <td>{{ $equipo->diferencia_goles }}</td>
                    <td>{{ $equipo->puntos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clasificacion->links() }}
@endsection
