@extends('layouts.app')

@section('title', 'Galería General')

@section('content')
    <div class="container mx-auto my-8 p-6 bg-gray-100 shadow-lg rounded-lg">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Galería General</h1>

        {{-- Verificar si la colección de galerías está vacía --}}
        @if($galerias->isEmpty())
            <p class="text-center text-gray-500">No hay fotos ni videos disponibles.</p>
        @else
            {{-- Grid para mostrar fotos y videos --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($galerias as $galeria)
                    <div class="gallery-item bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        {{-- Mostrar imagen si el tipo es foto --}}
                        @if ($galeria->tipo === 'foto')
                            <img src="{{ Storage::url($galeria->ruta) }}" alt="Foto" class="w-full h-auto rounded-lg transform hover:scale-105 transition-transform duration-300">
                        {{-- Mostrar video si el tipo es video --}}
                        @elseif ($galeria->tipo === 'video')
                            <video controls class="w-full h-auto rounded-lg transform hover:scale-105 transition-transform duration-300">
                                <source src="{{ Storage::url($galeria->ruta) }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
