<!-- C:\laragon\www\uniscore2\resources\views\public\matches.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Partidos</h1>

    <div class="row">
        @foreach ($partidos as $partido)
        <div class="col-md-4 mb-4">
            <div class="card border-primary">
                <div class="card-header text-center bg-primary text-white">
                    <h5 class="card-title mb-0">{{ $partido->equipoLocal->name }} vs {{ $partido->equipoVisitante->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Fecha:</strong> {{ $partido->match_date }}</p>
                    <p class="card-text"><strong>Hora:</strong> {{ $partido->match_time }}</p>
                    <p class="card-text"><strong>Lugar:</strong> {{ $partido->location }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
