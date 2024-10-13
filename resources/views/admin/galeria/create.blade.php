@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Agregar Nueva Galería</h1>
    <form action="{{ route('galeria.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="file_path">Archivo (Imagen o Video)</label>
            <input type="file" name="file_path" id="file_path" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control" required>
                <option value="photo">Foto</option>
                <option value="video">Video</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
