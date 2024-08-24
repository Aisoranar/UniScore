<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Los campos que se pueden llenar en masa
    protected $fillable = [
        'cedula',
        'name',
        'email',
        'password',
    ];

    // Campos que deben estar ocultos para la serialización
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Configuración para el campo de autenticación
    public function getAuthIdentifierName()
    {
        return 'cedula'; // Cambiado de 'username' a 'cedula'
    }

    // Configuración para los atributos que deben ser casteados
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Establecer la contraseña del usuario
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
