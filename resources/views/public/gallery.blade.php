<!-- C:\laragon\www\uniscore2\resources\views\public\gallery.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Galería</h1>
    <div class="row">
        @foreach ($galerias as $galeria)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $galeria->file_path) }}" class="card-img-top" alt="{{ $galeria->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeria->title }}</h5>
                        <p class="card-text">{{ $galeria->description }}</p>
                        <a href="{{ route('galeria.show', $galeria->id) }}" class="btn btn-info">Ver Imagen Completa</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
