<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//users routes
Route::middleware(['auth', 'access-level:user'])->group(function () {

Route::post('updateProfile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');

Route::get('/verPerfilUsu', [App\Http\Controllers\HomeController::class, 'verPerfilUsu'])->name('verPerfilUsu');

Route::post('cambiar-pass', [App\Http\Controllers\HomeController::class, 'changePasswordUsu'])->name('cambiar.pass');

 Route::get('cambiarPass', [App\Http\Controllers\HomeController::class, 'cambiarPass'])->name('cambiarPass');

 Route::get('confirmacionUsuario', [App\Http\Controllers\HomeController::class, 'confirmacionUsuario'])->name('confirmacionUsuario');

  Route::get('confirmacionPass', [App\Http\Controllers\HomeController::class, 'confirmacionPass'])->name('confirmacionPass');

Route::post('casosUsuario', [App\Http\Controllers\HomeController::class, 'casosUsuario'])->name('casosUsuario');
Route::post('getRegiones',
    [App\Http\Controllers\HomeController::class, 'getRegiones'])->name('getRegiones');

Route::post('getComunas', 
    [App\Http\Controllers\HomeController::class, 'getComunas'])->name('getComunas');
    //POST
Route::post('guardar-formulario', [App\Http\Controllers\HomeController::class, 'guardarFrm'])->name('guardar-formulario');

Route::get('/ingreso-caso',  [App\Http\Controllers\HomeController::class,'ingresoCaso'])->name('ingreso-caso');
// ************************************************************************
    Route::get('/bienvenido',  [App\Http\Controllers\HomeController::class,'graciasRegistro'])->name('bienvenido');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/postularFondos', [App\Http\Controllers\HomeController::class, 'postularFondos'])->name('postularFondos');
    Route::get('/postularProyectos', [App\Http\Controllers\HomeController::class, 'postularProyectos'])->name('postularProyectos');
    Route::get('/verEstadoPostulaciones', [App\Http\Controllers\HomeController::class, 'verEstadoPostulaciones'])->name('verEstadoPostulaciones');

    Route::get('/seguimientoProyectos',[App\Http\Controllers\HomeController::class,'seguimientoProyectos'])->name('seguimientoProyectos');
    Route::get('/enviarCaso', [App\Http\Controllers\HomeController::class,'enviarCaso'])->name('enviarCaso');
    Route::get('/seguimientoCasosUsu', [App\Http\Controllers\HomeController::class,'seguimientoCasosUsu'])->name('seguimientoCasosUsu');
    Route::get('/detalleProyecto',  [App\Http\Controllers\HomeController::class,'detalleProyecto'])->name('detalleProyecto');
    Route::get('/respuestaProyecto',  [App\Http\Controllers\HomeController::class,'respuestaProyecto'])->name('respuestaProyecto');
    Route::get('/agradecimiento',  [App\Http\Controllers\HomeController::class,'agradecimiento'])->name('agradecimiento');
    Route::get('respuestaCaso/{id}', [App\Http\Controllers\HomeController::class, 'respuestaCaso'])->name('respuestaCaso');
});

// admin routes
Route::middleware(['auth', 'access-level:admin'])->group(function () {
    
    Route::post('/change-password', [App\Http\Controllers\AdminController::class, 'changePassword'])->name('change.password');

    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');

      Route::get('verPerfil', [App\Http\Controllers\AdminController::class, 'verPerfil'])->name('verPerfil');

      Route::get('confirmacionPassAdmin', [App\Http\Controllers\AdminController::class, 'confirmacionPassAdmin'])->name('confirmacionPassAdmin');

            Route::get('cambiarPassAdmin', [App\Http\Controllers\AdminController::class, 'cambiarPassAdmin'])->name('cambiarPassAdmin');
    Route::post('casosUsuarioAdmin', [App\Http\Controllers\AdminController::class, 'casosUsuarioAdmin'])->name('casosUsuarioAdmin');
    Route::get('/usuariosRegistrados', [App\Http\Controllers\AdminController::class, 'usuariosRegistrados'])->name('usuariosRegistrados');
    Route::get('/seguimientoFondos', [App\Http\Controllers\AdminController::class, 'seguimientoFondos'])->name('seguimientoFondos');
    Route::get('/seguimientoCasosAdmin',[App\Http\Controllers\AdminController::class, 'seguimientoCasosAdmin'])->name('seguimientoCasosAdmin');
    Route::get('/verPostulacionesFondos',  [App\Http\Controllers\AdminController::class, 'verPostulacionesFondos'])->name('verPostulacionesFondos');
    Route::get('/verSugerenciaReclamo',  [App\Http\Controllers\AdminController::class, 'verSugerenciaReclamo'])->name('verSugerenciaReclamo');
    Route::get('/verPostulacionesProyectos',  [App\Http\Controllers\AdminController::class, 'verPostulacionesProyectos'])->name('verPostulacionesProyectos');
    Route::get('responderCaso/{id}', [App\Http\Controllers\AdminController::class, 'responderCaso'])->name('responderCaso');
    Route::get('respuestaCasoAdmin/{id}', [App\Http\Controllers\AdminController::class, 'respuestaCasoAdmin'])->name('respuestaCasoAdmin');
    Route::post('cerrarCaso', [App\Http\Controllers\AdminController::class, 'cerrarCaso'])->name('cerrarCaso');
    Route::get('confirmacionRespuestaCaso',  [App\Http\Controllers\HomeController::class,'confirmacionRespuestaCaso'])->name('confirmacionRespuestaCaso');
});






