@extends('layouts.app')

@section('content')
    <h1>Próximos Partidos - {{ $torneo->nombre }}</h1>
    <ul class="list-group">
        @foreach ($partidos as $partido)
            <li class="list-group-item">
                {{ $partido->equipoLocal->nombre }} vs {{ $partido->equipoVisitante->nombre }} - {{ $partido->fecha }} a las {{ $partido->hora }} en {{ $partido->ubicacion }}
            </li>
        @endforeach
    </ul>
@endsection
