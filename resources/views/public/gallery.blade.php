@extends('layouts.app')

@section('content')
    <h1>Galería</h1>
    <ul>
        @foreach($gallery as $item)
            <li>
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <img src="{{ asset($item->file_path) }}" alt="{{ $item->title }}">
            </li>
        @endforeach
    </ul>
@endsection
