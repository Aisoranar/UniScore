<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Los campos que se pueden llenar en masa
    protected $fillable = ['cedula', 'email', 'password'];

    // Campos que deben estar ocultos para la serialización
    protected $hidden = ['password', 'remember_token'];

    // Configuración para el campo de autenticación
    public function getAuthIdentifierName()
    {
        return 'cedula'; // Cambiado de 'username' a 'cedula'
    }

    // Establecer la contraseña del usuario
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
