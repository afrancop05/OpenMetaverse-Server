<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ver', [UserController::class, "verContenido"]) -> name("ver.contenido");
// Ruta para mostrar el formulario (GET)
Route::get('/subir', [UserController::class, 'mostrarFormularioSubida'])->name('mostrar.formulario.subida');

// Ruta para procesar la subida del archivo (POST)
Route::post('/subir', [UserController::class, 'subirContenido'])->name('subir.contenido');