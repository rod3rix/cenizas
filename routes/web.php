<?php

use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//users routes
Route::middleware(['auth', 'access-level:user'])->group(function () {

Route::post('getRegiones',
    [App\Http\Controllers\FrmController::class, 'getRegiones'])->name('getRegiones');

Route::post('getComunas', 
    [App\Http\Controllers\FrmController::class, 'getComunas'])->name('getComunas');

    //POST
    Route::post('guardar-formulario', [App\Http\Controllers\FrmController::class, 'guardarFrm'])->name('guardar-formulario');

    Route::get('/ingreso-caso',  [App\Http\Controllers\HomeController::class,'ingresoCaso'])->name('ingreso-caso');

// ************************************************************************
    Route::get('/bienvenido',  [App\Http\Controllers\HomeController::class,'graciasRegistro'])->name('bienvenido');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/postularFondos', [App\Http\Controllers\HomeController::class, 'postularFondos'])->name('postularFondos');
    Route::get('/postularProyectos', [App\Http\Controllers\HomeController::class, 'postularProyectos'])->name('postularProyectos');

    Route::get('/verEstadoPostulaciones', [App\Http\Controllers\HomeController::class, 'verEstadoPostulaciones'])->name('verEstadoPostulaciones');

    Route::get('/editarPerfil', [App\Http\Controllers\HomeController::class, 'editarPerfil'])->name('editarPerfil');
    Route::get('/seguimientoProyectos',[App\Http\Controllers\HomeController::class,'seguimientoProyectos'])->name('seguimientoProyectos');
    Route::get('/enviarCaso', [App\Http\Controllers\HomeController::class,'enviarCaso'])->name('enviarCaso');
    Route::get('/seguimientoCasosUsu', [App\Http\Controllers\HomeController::class,'seguimientoCasosUsu'])->name('seguimientoCasosUsu');
    Route::get('/detalleProyecto',  [App\Http\Controllers\HomeController::class,'detalleProyecto'])->name('detalleProyecto');
    Route::get('/respuestaProyecto',  [App\Http\Controllers\HomeController::class,'respuestaProyecto'])->name('respuestaProyecto');
    Route::get('/agradecimiento',  [App\Http\Controllers\HomeController::class,'agradecimiento'])->name('agradecimiento');
});
// admin routes
Route::middleware(['auth', 'access-level:admin'])->group(function () {
  
    Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/usuariosRegistrados', [App\Http\Controllers\HomeController::class, 'usuariosRegistrados'])->name('usuariosRegistrados');
    Route::get('/seguimientoFondos', [App\Http\Controllers\HomeController::class, 'seguimientoFondos'])->name('seguimientoFondos');
    Route::get('/seguimientoCasosAdmin',[App\Http\Controllers\HomeController::class, 'seguimientoCasosAdmin'])->name('seguimientoCasosAdmin');
    Route::get('/verPostulacionesFondos',  [App\Http\Controllers\HomeController::class, 'verPostulacionesFondos'])->name('verPostulacionesFondos');
    Route::get('/verSugerenciaReclamo',  [App\Http\Controllers\HomeController::class, 'verSugerenciaReclamo'])->name('verSugerenciaReclamo');
    Route::get('/verPostulacionesProyectos',  [App\Http\Controllers\HomeController::class, 'verPostulacionesProyectos'])->name('verPostulacionesProyectos');
});






