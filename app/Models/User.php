<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'username',
        'email',
        'password',
        'role',
    ];

    protected static function boot()
    {
        parent::boot();

        // Asignar el rol 'student' por defecto si no se especifica otro
        static::creating(function ($user) {
            $user->role = $user->role ?? 'student';
        });
    }

    // Mutador para encriptar la contraseña automáticamente antes de guardarla
    public function setPasswordAttribute($value)
    {
        // Solo encripta la contraseña si no está ya encriptada
        $this->attributes['password'] = Hash::needsRehash($value) ? bcrypt($value) : $value;
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
