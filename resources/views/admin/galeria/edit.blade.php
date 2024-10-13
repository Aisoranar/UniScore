@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Editar Galería</h1>
    <form action="{{ route('galeria.update', $galeria->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $galeria->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control">{{ $galeria->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="file_path">Archivo (Imagen o Video)</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
            <p class="mt-2">Archivo Actual: <a href="{{ asset('storage/' . $galeria->file_path) }}" target="_blank">Ver Archivo</a></p>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control" required>
                <option value="photo" {{ $galeria->type == 'photo' ? 'selected' : '' }}>Foto</option>
                <option value="video" {{ $galeria->type == 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
