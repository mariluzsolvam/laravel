<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Campos que se pueden rellenar de forma masiva
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

    // Campos que se ocultarán en las respuestas JSON por seguridad
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts nativos de Laravel
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}