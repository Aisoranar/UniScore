@extends('layouts.auth-master')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="text-center mb-8">
    <h1 class="text-4xl font-bold text-blue-700 animate-pulse">Iniciar Sesión</h1>
</div>
<form action="{{ route('login.post') }}" method="POST" class="space-y-6">
    @csrf
    @include('layouts.partials.message')

    <!-- Cedula con Label Flotante -->
    <div class="floating-label mb-6">
        <input type="text" name="cedula" id="cedulaInput" placeholder=" " class="peer" required>
        <label for="cedulaInput">Ingrese su cédula</label>
    </div>

    <!-- Contraseña con Label Flotante -->
    <div class="floating-label mb-6">
        <input type="password" name="password" id="passwordInput" placeholder=" " class="peer" required>
        <label for="passwordInput">Ingrese su contraseña</label>
    </div>

    <!-- Tipo de Usuario con Label Flotante -->
    <div class="floating-label mb-6">
        <select name="role" id="roleSelect" class="peer" required>
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select>
        <label for="roleSelect">Tipo de Usuario</label>
    </div>

    <!-- Botón de Enviar -->
    <button type="submit" class="btn-primary">
        Iniciar Sesión
    </button>

    <div class="text-center text-sm text-gray-600 mt-4">
        <p>¿No tienes cuenta? <a href="{{ route('register.show') }}" class="text-blue-600 hover:underline font-medium">Crear cuenta</a></p>
        <p class="mt-3"><a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600 hover:underline font-medium">← Volver al inicio</a></p>
    </div>
</form>
@endsection
