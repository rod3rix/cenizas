<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(): View
    {
        return view('admin');
    }

    public function postularFondos()
    {
        return view('postularFondos');      
    }

    public function postularProyectos()
    {
        return view('postularProyectos'); 
    }

    public function editarPerfil()
    {
        return view('editarPerfil'); 
    }

    public function seguimientoProyectos()
    {
        return view('seguimientoProyectos'); 
    }
     
    public function enviarCaso()
    {
        return view('enviarCaso'); 
    } 
  
    public function seguimientoCasosUsu()
    {
        return view('seguimientoCasosUsuario');
    } 
  
    public function detalleProyecto()
    {
        return view('detalleProyecto'); 
    }
  
    public function respuestaProyecto()
    {
        return view('respuestaProyecto'); 
    }
  
    public function agradecimiento()
    {
        return view('agradecimiento'); 
    }
  
    public function usuariosRegistrados()
    {
        return view('usuariosRegistrados'); 
    }

    public function seguimientoFondos()
    {
        return view('seguimientoFondos'); 
    }

    public function seguimientoCasosAdmin()
    {
        return view('seguimientoCasosAdmin'); 
    }

    public function verPostulacionesFondos()
    {
        return view('verPostulacionesFondos'); 
    }

    public function verSugerenciaReclamo()
    {
        return view('verSugerenciaReclamo'); 
    }

    public function verPostulacionesProyectos()
    {
        return view('verPostulacionesProyectos');
    }

    public function verEstadoPostulaciones()
    {
        return view('verPostulacionesProyectos');
    }

    public function graciasRegistro()
    {
        return view('graciasRegistro');
    }

}