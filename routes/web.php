<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Http\Controllers\CaptchaController;

Route::get('refreshcaptcha', [CaptchaController::class, 'refresh']);
Route::get('captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    return $captcha->create($config);
});
Route::post('createcaptcha', [App\Http\Controllers\CaptchaController::class, 'captchaValidate'])->name("captchacontroller.captcha");
Route::get('refreshcaptcha', [App\Http\Controllers\CaptchaController::class, 'refreshCaptcha'])->name("captchacontroller.refresh");
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {  
    if(auth()->user()){
         if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.dashboard');
          }else{
            return redirect()->route('home');
         }
    }else{
       return redirect()->route('login');      
    }
});

Route::get('terminoCondiciones', function () {
    return view('terminoCondiciones');
})->name('terminoCondiciones');

Auth::routes();

Route::middleware(['class','auth', 'access-level:user'])->group(function () {
    Route::get('/clausulaProyecto', [App\Http\Controllers\HomeController::class, 'clausulaProyecto'])->name('clausulaProyecto');
    Route::get('/clausulaFondo', [App\Http\Controllers\HomeController::class, 'clausulaFondo'])->name('clausulaFondo');
    Route::get('/seguimientoFondos', [App\Http\Controllers\HomeController::class, 'seguimientoFondos'])->name('seguimientoFondos');
    Route::post('editarPersonaJuridica/actualizarPersonaJuridica',  [App\Http\Controllers\HomeController::class, 'actualizarPersonaJuridica'])->name('actualizarPersonaJuridica');
    Route::get('/editarPersonaJuridica/{id}',  [App\Http\Controllers\HomeController::class, 'editarPersonaJuridica'])->name('editarPersonaJuridica');
    Route::post('/listarPersonaJuridicas',  [App\Http\Controllers\HomeController::class, 'listarPersonaJuridicas'])->name('listarPersonaJuridicas');
    Route::post('/listarFondos',  [App\Http\Controllers\HomeController::class, 'listarFondos'])->name('listarFondos');
    Route::post('/listarApoyoProyectos',  [App\Http\Controllers\HomeController::class, 'listarApoyoProyectos'])->name('listarApoyoProyectos');
    Route::post('/crearPersonaJuridica',  [App\Http\Controllers\HomeController::class, 'crearPersonaJuridica'])->name('crearPersonaJuridica');
    Route::post('updateProfile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    Route::get('confirmacionPersonaJuridica', [App\Http\Controllers\HomeController::class, 'confirmacionPersonaJuridica'])->name('confirmacionPersonaJuridica');
    Route::get('confirmacionProyecto', [App\Http\Controllers\HomeController::class, 'confirmacionProyecto'])->name('confirmacionProyecto');
    Route::get('confirmacionFondos', [App\Http\Controllers\HomeController::class, 'confirmacionFondos'])->name('confirmacionFondos');
    Route::get('confirmacionEditarPersonaJuridica', [App\Http\Controllers\HomeController::class, 'confirmacionEditarPersonaJuridica'])->name('confirmacionEditarPersonaJuridica');
    Route::get('personaJuridica', [App\Http\Controllers\HomeController::class, 'personaJuridica'])->name('personaJuridica');
    Route::get('/verPerfilUsu', [App\Http\Controllers\HomeController::class, 'verPerfilUsu'])->name('verPerfilUsu');

    Route::post('cambiarPass', [App\Http\Controllers\HomeController::class, 'changePasswordUsu'])->name('cambiarPass');
    Route::get('cambiarPass', [App\Http\Controllers\HomeController::class, 'cambiarPass'])->name('cambiarPass');
    Route::get('confirmacionUsuario', [App\Http\Controllers\HomeController::class, 'confirmacionUsuario'])->name('confirmacionUsuario');
    Route::get('confirmacionPass', [App\Http\Controllers\HomeController::class, 'confirmacionPass'])->name('confirmacionPass');
    Route::post('casosUsuario', [App\Http\Controllers\HomeController::class, 'casosUsuario'])->name('casosUsuario');
    Route::post('getRegiones',
    [App\Http\Controllers\HomeController::class, 'getRegiones'])->name('getRegiones');
    Route::post('getComunas', 
    [App\Http\Controllers\HomeController::class, 'getComunas'])->name('getComunas');
    Route::post('crearCaso', [App\Http\Controllers\HomeController::class, 'crearCaso'])->name('crearCaso');
    Route::post('validarFrmProy', [App\Http\Controllers\HomeController::class, 'validarFrmProy'])->name('validarFrmProy');
    Route::post('validarFrmFondos', [App\Http\Controllers\HomeController::class, 'validarFrmFondos'])->name('validarFrmFondos');
    Route::get('/ingreso-caso',  [App\Http\Controllers\HomeController::class,'ingresoCaso'])->name('ingreso-caso');
    Route::get('/bienvenido',  [App\Http\Controllers\HomeController::class,'graciasRegistro'])->name('bienvenido');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/postularFondos', [App\Http\Controllers\HomeController::class, 'postularFondos'])->name('postularFondos');
    Route::get('/postularProyectos', [App\Http\Controllers\HomeController::class, 'postularProyectos'])->name('postularProyectos');
    Route::get('/verEstadoPostulaciones', [App\Http\Controllers\HomeController::class, 'verEstadoPostulaciones'])->name('verEstadoPostulaciones');
    Route::get('/seguimientoProyectos',[App\Http\Controllers\HomeController::class,'seguimientoProyectos'])->name('seguimientoProyectos');
    Route::get('/enviarCaso', [App\Http\Controllers\HomeController::class,'enviarCaso'])->name('enviarCaso');
    Route::get('/seguimientoCasosUsu', [App\Http\Controllers\HomeController::class,'seguimientoCasosUsu'])->name('seguimientoCasosUsu');
    Route::get('/detalleProyecto',  [App\Http\Controllers\HomeController::class,'detalleProyecto'])->name('detalleProyecto');
    Route::get('/respuestaProyecto/{id}', [App\Http\Controllers\HomeController::class,'respuestaProyecto'])->name('respuestaProyecto');
    Route::get('/agradecimiento',  [App\Http\Controllers\HomeController::class,'agradecimiento'])->name('agradecimiento');
    Route::get('respuestaCaso/{id}', [App\Http\Controllers\HomeController::class, 'respuestaCaso'])->name('respuestaCaso');
    Route::get('/obtenerPersonasJuridicas', [App\Http\Controllers\HomeController::class, 'obtenerPersonasJuridicas'])->name('obtenerPersonasJuridicas');
     Route::get('/obtenerOrganizaciones', [App\Http\Controllers\HomeController::class, 'obtenerOrganizaciones'])->name('obtenerOrganizaciones');
     Route::get('respuestaFondo/{id}', [App\Http\Controllers\HomeController::class, 'respuestaFondo'])->name('respuestaFondo');
});

Route::middleware(['class','auth', 'access-level:admin'])->group(function () {
    Route::get('/crearFondoConcursable',  [App\Http\Controllers\AdminController::class,'crearFondoConcursable'])->name('crearFondoConcursable');
    Route::post('getUserDetails', [App\Http\Controllers\AdminController::class, 'getUserDetails'])->name('getUserDetails');
    Route::post('getTFondo', [App\Http\Controllers\AdminController::class, 'getTFondo'])->name('getTFondo');
    Route::post('getFondo', [App\Http\Controllers\AdminController::class, 'getFondo'])->name('getFondo');
    Route::post('updateATFondo', [App\Http\Controllers\AdminController::class, 'updateATFondo'])->name('updateATFondo');
    Route::post('updateAFondo', [App\Http\Controllers\AdminController::class, 'updateAFondo'])->name('updateAFondo');
    Route::post('updateUser/{id}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('updateUser');
    Route::post('registrarUsuAdmin', [App\Http\Controllers\AdminController::class, 'registrarUsuAdmin'])->name('registrarUsuAdmin');
    Route::get('/detalleProyectoAdmin/{id}',  [App\Http\Controllers\AdminController::class,'detalleProyectoAdmin'])->name('detalleProyectoAdmin');
    Route::get('/respuestaProyectoAdmin/{id}',  [App\Http\Controllers\AdminController::class,'respuestaProyectoAdmin'])->name('respuestaProyectoAdmin');
    Route::get('/detalleFondoAdmin/{id}',  [App\Http\Controllers\AdminController::class,'detalleFondoAdmin'])->name('detalleFondoAdmin');
    Route::post('/listarUsuariosAdmin',  [App\Http\Controllers\AdminController::class, 'listarUsuariosAdmin'])->name('listarUsuariosAdmin');
    Route::post('/listarApoyoProyectosAdmin',  [App\Http\Controllers\AdminController::class, 'listarApoyoProyectosAdmin'])->name('listarApoyoProyectosAdmin');
    Route::post('/listarFondosAdmin',  [App\Http\Controllers\AdminController::class, 'listarFondosAdmin'])->name('listarFondosAdmin');
    Route::post('listarUsers', [App\Http\Controllers\AdminController::class, 'getData'])->name('listarUsers');
    Route::post('/cambiarPassAd', [App\Http\Controllers\AdminController::class, 'changePassword'])->name('cambiarPassAd');
    Route::post('detalleUser/guardarPuntaje', [App\Http\Controllers\AdminController::class, 'guardarPuntaje'])->name('guardarPuntaje');
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('verPerfil', [App\Http\Controllers\AdminController::class, 'verPerfil'])->name('verPerfil');
    Route::get('confirmacionPassAdmin', [App\Http\Controllers\AdminController::class, 'confirmacionPassAdmin'])->name('confirmacionPassAdmin');
    Route::get('confirmacionProyectoAdmin', [App\Http\Controllers\AdminController::class, 'confirmacionProyectoAdmin'])->name('confirmacionProyectoAdmin');
    Route::get('confirmacionFondoAdmin', [App\Http\Controllers\AdminController::class, 'confirmacionFondoAdmin'])->name('confirmacionFondoAdmin');
    Route::get('cambiarPassAdmin', [App\Http\Controllers\AdminController::class, 'cambiarPassAdmin'])->name('cambiarPassAdmin');
    Route::post('casosUsuarioAdmin', [App\Http\Controllers\AdminController::class, 'casosUsuarioAdmin'])->name('casosUsuarioAdmin');
    Route::get('/usuariosRegistrados', [App\Http\Controllers\AdminController::class, 'usuariosRegistrados'])->name('usuariosRegistrados');
    Route::get('/seguimientoCasosAdmin',[App\Http\Controllers\AdminController::class, 'seguimientoCasosAdmin'])->name('seguimientoCasosAdmin');
    Route::get('/verPostulacionesFondos',  [App\Http\Controllers\AdminController::class, 'verPostulacionesFondos'])->name('verPostulacionesFondos');
    Route::get('/verSugerenciaReclamo',  [App\Http\Controllers\AdminController::class, 'verSugerenciaReclamo'])->name('verSugerenciaReclamo');
    Route::get('/verPostulacionesProyectos',  [App\Http\Controllers\AdminController::class, 'verPostulacionesProyectos'])->name('verPostulacionesProyectos');
    Route::get('detalleUser/{id}', [App\Http\Controllers\AdminController::class, 'detalleUser'])->name('detalleUser');
    Route::get('responderCaso/{id}', [App\Http\Controllers\AdminController::class, 'responderCaso'])->name('responderCaso');
    Route::get('respuestaCasoAdmin/{id}', [App\Http\Controllers\AdminController::class, 'respuestaCasoAdmin'])->name('respuestaCasoAdmin');
    Route::get('respuestaFondoAdmin/{id}', [App\Http\Controllers\AdminController::class, 'respuestaFondoAdmin'])->name('respuestaFondoAdmin');
    Route::post('responderCaso/cerrarCaso', [App\Http\Controllers\AdminController::class, 'cerrarCaso'])->name('cerrarCaso');
    Route::post('detalleProyectoAdmin/cerrarProyecto', [App\Http\Controllers\AdminController::class, 'cerrarProyecto'])->name('cerrarProyecto');
    Route::post('detalleFondoAdmin/cerrarFondo', [App\Http\Controllers\AdminController::class, 'cerrarFondo'])->name('cerrarFondo');
    Route::get('confirmacionRespuestaCaso',  [App\Http\Controllers\AdminController::class,'confirmacionRespuestaCaso'])->name('confirmacionRespuestaCaso');
    Route::get('confirmacionAsignacion',  [App\Http\Controllers\AdminController::class,'confirmacionAsignacion'])->name('confirmacionAsignacion');
    Route::post('frmCrearAFondo', [App\Http\Controllers\AdminController::class, 'frmCrearAFondo'])->name('frmCrearAFondo');
    Route::get('/obtenerTitulosFondos', [App\Http\Controllers\AdminController::class, 'obtenerTitulosFondos'])->name('obtenerTitulosFondos');
    Route::get('listarFondosConcursables',  [App\Http\Controllers\AdminController::class,'listarFondosConcursables'])->name('listarFondosConcursables');
    Route::post('/listarEdicionTFondos',  [App\Http\Controllers\AdminController::class, 'listarEdicionTFondos'])->name('listarEdicionTFondos');
    Route::post('/listarEdicionFondos',  [App\Http\Controllers\AdminController::class, 'listarEdicionFondos'])->name('listarEdicionFondos');
});






