<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Desactivamos los timestamps porque tu tabla original no los tiene
    public $timestamps = false;

    protected $fillable = ['category'];

    // Una categoría tiene muchas noticias
    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'id_category', 'id');
    }
}