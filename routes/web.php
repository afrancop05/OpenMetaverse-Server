<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'showContent'])->name('home');

Route::get('/ver', [UserController::class, "showContentUser"]) -> name("ver.contenido");

Route::get('/borrar/{id}', [UserController::class, 'borrarContenido'])->name('borrar.contenido');

Route::post('/cambiar-visibilidad/{id}', [UserController::class, 'cambiarVisibilidad'])->name('cambiar.visibilidad');

Route::get('/editar/{id}', [UserController::class, 'mostrarFormularioEditar'])->name('editar.contenido');

Route::put('/actualizar-contenido/{id}', [UserController::class, 'actualizarContenido'])->name('actualizar.contenido');
// Ruta para mostrar el formulario (GET)
Route::get('/subir', [UserController::class, 'mostrarFormularioSubida'])->name('mostrar.formulario.subida');

// Ruta para procesar la subida del archivo (POST)
Route::post('/subir', [UserController::class, 'subirContenido'])->name('subir.contenido');