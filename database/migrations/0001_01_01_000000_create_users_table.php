<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');                          // Nativo de Laravel
            $table->string('email')->unique();               // Nativo (reemplaza a tu 'username')
            $table->timestamp('email_verified_at')->nullable(); // Nativo
            $table->string('password');                      // Nativo
            $table->integer('rol')->default(1);              // Tu campo personalizado para el control de acceso
            $table->rememberToken();                         // Nativo (para la opción "recuérdame")
            $table->timestamps();                            // Nativo (created_at y updated_at)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};