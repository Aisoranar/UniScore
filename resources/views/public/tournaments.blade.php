@extends('layouts.app')

@section('content')
    <h1>Torneos</h1>
    <ul>
        @foreach($tournaments as $tournament)
            <li>{{ $tournament->name }} ({{ $tournament->sport_type }})</li>
        @endforeach
    </ul>
@endsection
