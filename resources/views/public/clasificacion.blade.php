@extends('layouts.app')

@section('title', 'Clasificación del Torneo')

@section('content')
    <div class="container mx-auto my-6 p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Clasificación - {{ $torneo->nombre }}</h1>
        <table class="table table-striped table-bordered">
            <thead class="bg-primary text-white">
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
    </div>
@endsection
