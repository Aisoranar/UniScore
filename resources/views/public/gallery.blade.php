@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Galería</h1>

    <div class="row">
        @foreach ($galerias as $galeria)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset($galeria->file_path) }}" class="card-img-top" alt="{{ $galeria->title }}">
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
