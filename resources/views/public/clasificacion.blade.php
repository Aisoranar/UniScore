@extends('layouts.app')

@section('content')
    <h1>Clasificación - {{ $torneo->nombre }}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clasificacion as $equipo)
                <tr>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->puntos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
