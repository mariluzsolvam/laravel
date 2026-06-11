<?php

use Illuminate\Support\Facades\Route;

/* * En Laravel, la convención es añadir "Controller" al nombre de las clases 
 * y los controladores viven en App\Http\Controllers.
 */
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminNewsController;

// ==========================================
// FRONTEND
// ==========================================
Route::get('/', [NewsController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);

// En Laravel, `(:num)` pasa a ser un parámetro nombrado entre llaves, ej: `{id}`
Route::get('/news/category/{categoryId}', [NewsController::class, 'index']);

// `(:segment)` pasa a ser también un parámetro nombrado, ej: `{slug}`
Route::get('/news/{slug}', [NewsController::class, 'show']);


// ==========================================
// LOGIN
// ==========================================
// Nota: Le asignamos el nombre 'login' (->name('login')) porque el 
// middleware de Laravel redirige automáticamente a esta ruta si no estás logueado.
Route::get('/login', [UserController::class, 'loginForm'])->name('login'); 
Route::post('/checkUser', [UserController::class, 'checkUser']);


// ==========================================
// CIERRE SESION
// ==========================================
Route::get('/signOut', [UserController::class, 'signOut']); 


// ==========================================
// BACKEND - NEWS
// ==========================================
/* * Los "filters" de CodeIgniter se llaman "middlewares" en Laravel.
 * Usamos `prefix` para la URL base y agrupamos las rutas.
 */
Route::prefix('admin/news')->middleware('auth')->group(function () {
    
    Route::get('/', [AdminNewsController::class, 'index']); // Mostrar noticias

    Route::get('/new', [AdminNewsController::class, 'new']); // Formulario insertar
    Route::post('/create', [AdminNewsController::class, 'create']); // Envía el formulario insertar

    // Usamos {id} en lugar de (:num)
    Route::get('/delete/{id}', [AdminNewsController::class, 'delete']);
    
    // Formulario edicion
    Route::get('/editForm/{id}', [AdminNewsController::class, 'editForm']);
    
    // Envia el form edicion
    Route::post('/update/{id}', [AdminNewsController::class, 'update']);

});