<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Datos de Categorías
        DB::table('categories')->insert([
            ['id' => 1, 'category' => 'Science'],
            ['id' => 2, 'category' => 'Celebs'],
            ['id' => 3, 'category' => 'TV'],
            ['id' => 4, 'category' => 'Royals'],
            ['id' => 5, 'category' => 'News'],
        ]);

        // 2. Datos de Noticias
        DB::table('news')->insert([
            [
                'id' => 1,
                'title' => 'Elvis sighted',
                'slug' => 'elvis-sighted',
                'body' => 'Elvis was sighted at the Podunk internet cafe. It looked like he was writing a CodeIgniter app.',
                'id_category' => 2,
                'image' => 'elvis-sighted.webp'
            ],
            [
                'id' => 2,
                'title' => "Say it isn't so!",
                'slug' => 'say-it-isnt-so',
                'body' => 'Scientists conclude that some programmers have a sense of humor.',
                'id_category' => 1,
                'image' => 'say-it-isnt-so.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Caffeination, Yes!',
                'slug' => 'caffeination-yes',
                'body' => "World's largest coffee shop open onsite nested coffee shop for staff only.",
                'id_category' => 5,
                'image' => 'caffeination-yes.jpg'
            ],
            [
                'id' => 4,
                'title' => 'NoticiasHoy3',
                'slug' => 'noticiashoy3',
                'body' => 'Noticia destacada del día222222222',
                'id_category' => 4,
                'image' => null
            ],
        ]);

        // 3. Datos de Usuarios (Tus contraseñas ya están encriptadas en Bcrypt, Laravel las reconocerá perfectamente)
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$LDd1r3n0JTe4CIJUk0bi9OTxPKyyhm349cHIkt5/Ye9LvLoFLGs4m',
                'rol' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'username' => 'mluz',
                'password' => '$2y$10$RoslxC.CxNpLsdjinCHOZezgQ.OBMhGWskKMKTi9VkH2jautXF/qi',
                'rol' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}