@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Galería</h1>
    <a href="{{ route('galeria.create') }}" class="btn btn-success mb-3">Agregar Nueva Galería</a>
    <div class="row">
        @foreach ($galerias as $galeria)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $galeria->file_path) }}" class="card-img-top" alt="{{ $galeria->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeria->title }}</h5>
                        <p class="card-text">{{ $galeria->description }}</p>
                        <a href="{{ route('galeria.edit', $galeria->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('galeria.destroy', $galeria->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta galería?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
