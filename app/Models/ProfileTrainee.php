<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileTrainee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'city_id',
        'document_type',
        'document_number',
        'zone',
        'birth_date',
        'age',
        'marital_status',
        'has_children',
        'address',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   

    public static function createFromUser(User $user, array $data)
    {
        return self::create(array_merge($data, [
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'second_name' => $user->second_name,
            'first_lastname' => $user->first_lastname,
            'second_lastname' => $user->second_lastname,
        ]));
    }
}
