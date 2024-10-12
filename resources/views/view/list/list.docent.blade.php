@extends('layouts.app-master')
{{-- resources/views/view/list/list.docent.blade.php --}}
@extends('layouts.app') {{-- Cambia esto si tu layout tiene otro nombre --}}

@section('content')
<div class="container">
    <h1 class="text-center">Lista de Docentes</h1>
    <!-- Aquí puedes agregar la lógica para mostrar la lista de docentes -->
    {{-- Por ejemplo, si tienes una variable $docents que contiene la lista de docentes --}}
    {{-- @foreach($docents as $docent)
        <div>{{ $docent->name }}</div>
    @endforeach --}}
</div>
@endsection
