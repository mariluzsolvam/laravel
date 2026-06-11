<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $column) {
            $column->id();
            $column->string('title', 128);
            $column->string('slug', 128)->unique();
            $column->text('body');
            
            // Llave foránea conectada a la tabla categories
            $column->foreignId('id_category')
                   ->constrained('categories')
                   ->onUpdate('cascade')
                   ->onDelete('restrict'); 
                   
            $column->string('image', 100)->nullable(); // nullable por si viene vacía como tu registro 4
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};