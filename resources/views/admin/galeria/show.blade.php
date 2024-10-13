@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ $galeria->title }}</h1>
    <img src="{{ asset('storage/' . $galeria->file_path) }}" class="img-fluid" alt="{{ $galeria->title }}">
    <p class="mt-3">{{ $galeria->description }}</p>
    <a href="{{ route('galeria.index') }}" class="btn btn-secondary">Volver a la Galería</a>
</div>
@endsection
