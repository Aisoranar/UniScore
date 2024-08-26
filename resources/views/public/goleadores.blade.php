@extends('layouts.app')

@section('title', 'Goleadores del Torneo')

@section('content')
    <div class="container mx-auto my-6 p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Goleadores del Torneo - {{ $torneo->nombre ?? 'Torneo no disponible' }}</h1>
        <table class="table table-striped table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Jugador</th>
                    <th>Goles</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($goleadores as $goleador)
                    <tr>
                        <td>{{ $goleador->jugador ? $goleador->jugador->nombre : 'Jugador no disponible' }}</td>
                        <td>{{ $goleador->goles }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
