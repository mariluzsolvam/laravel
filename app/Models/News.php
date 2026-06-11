<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    // Forzamos el nombre de la tabla porque "news" en inglés es un plural irregular
    protected $table = 'news';
    
    public $timestamps = false;

    protected $fillable = ['title', 'slug', 'body', 'id_category', 'image'];

    // Una noticia pertenece a una categoría
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}