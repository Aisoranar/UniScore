<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    // Si el nombre de la tabla no sigue la convención plural, define el nombre explícitamente
    protected $table = 'galeria';

    // Si la tabla tiene una columna de clave primaria diferente a 'id'
    protected $primaryKey = 'id';

    // Si la tabla no usa las marcas de tiempo (created_at y updated_at)
    public $timestamps = true; // o false si no usas marcas de tiempo

    // Definir las columnas que se pueden asignar en masa
    protected $fillable = ['torneo_id', 'tipo', 'ruta'];
}
