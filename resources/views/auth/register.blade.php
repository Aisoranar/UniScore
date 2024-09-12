@extends('layouts.auth-master')

@section('title', 'Crear Cuenta')

@section('content')
<div class="text-center mb-8">
    <h1 class="text-4xl font-bold text-blue-700 animate-pulse">Crear Cuenta</h1>
</div>
<form action="{{ route('register.post') }}" method="POST" class="space-y-6">
    @csrf
    @include('layouts.partials.message')

    <!-- Cedula con Label Flotante -->
    <div class="floating-label mb-6">
        <input type="text" name="cedula" id="cedulaInput" placeholder=" " class="peer" required>
        <label for="cedulaInput">Ingrese su cédula</label>
    </div>

    <!-- Correo con Label Flotante -->
    <div class="floating-label mb-6">
        <input type="email" name="email" id="emailInput" placeholder=" " class="peer" required>
        <label for="emailInput">Correo electrónico</label>
    </div>

    <!-- Nombre de usuario con Label Flotante -->
    <div class="floating-label mb-6">
        <input type="text" name="username" id="usernameInput" placeholder=" " class="peer" required>
        <label for="usernameInput">Nombre de usuario</label>
    </div>

    <!-- Tipo de Usuario con Label Flotante -->
    <div class="floating-label mb-6">
        <select name="role" id="roleSelect" class="peer" required>
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select>
        <label for="roleSelect">Tipo de Usuario</label>
    </div>

    <!-- Contraseña con Label Flotante -->
    <div class="floating-label mb-6">
        <input type="password" name="password" id="passwordInput" placeholder=" " class="peer" required>
        <label for="passwordInput">Contraseña</label>
    </div>

    <!-- Confirmar Contraseña con Label Flotante -->
    <div class="floating-label mb-6">
        <input type="password" name="password_confirmation" id="passwordConfirmationInput" placeholder=" " class="peer" required>
        <label for="passwordConfirmationInput">Confirmar contraseña</label>
    </div>

    <!-- Botón de Enviar -->
    <button type="submit" class="btn-primary">
        Crear Cuenta
    </button>

    <div class="text-center text-sm text-gray-600 mt-4">
        <p>¿Ya tienes cuenta? <a href="{{ route('login.show') }}" class="text-blue-600 hover:underline font-medium">Iniciar Sesión</a></p>
    </div>
</form>
@endsection
