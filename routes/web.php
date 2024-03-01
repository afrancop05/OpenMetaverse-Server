<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorldMaker;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'showContent'])->name('home');

Route::get('/ver', [UserController::class, "showContentUser"])->name("ver.contenido");

Route::get('/borrar/{id}', [UserController::class, 'borrarContenido'])->name('borrar.contenido');

Route::post('/cambiar-visibilidad/{id}', [UserController::class, 'cambiarVisibilidad'])->name('cambiar.visibilidad');

Route::get('/editar/{id}', [UserController::class, 'mostrarFormularioEditar'])->name('editar.contenido');

Route::put('/actualizar-contenido/{id}', [UserController::class, 'actualizarContenido'])->name('actualizar.contenido');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.todos');

Route::get('rolusuario/{id}', [UserController::class, "cambiarRol"]) -> name("rolusuario");

Route::get('borrausuario/{id}', [UserController::class, "destroy"]) -> name("borrarusuario");

Route::get('descargar', [UserController::class, "descargarCliente"]) -> name("descargar.cliente");

Route::get('/descargar/{fileName}', [UserController::class, "descargarFichero"])->name('descargar.fichero');

// Ruta para mostrar el formulario (GET)
Route::get('/subir', [UserController::class, 'mostrarFormularioSubida'])->name('mostrar.formulario.subida');

// Ruta para procesar la subida del archivo (POST)
Route::post('/subir', [UserController::class, 'subirContenido'])->name('subir.contenido');

Route::get('crearmundo', [WorldMaker::class, 'crearMundo'])->name('crear.mundo');

Route::post('crearmundo', [WorldMaker::class, 'guardarMundo'])->name('crear.mundo');
