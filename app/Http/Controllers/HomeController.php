<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


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
        $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

                $user=$user[0];

                //dd($user);

        return view('enviarCaso',['user' => $user]);
    } 

     public function guardarFormulario1(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tipo' => 'required',
            'localidad' => 'required',
            'region' => 'required',
            'comuna' => 'required',
            'direccion' => 'required',
            'asunto' => 'required',
            'descripcion' => 'required',
            'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $archivo = $request->file('archivo');

        // Guardar el archivo en el directorio deseado
        $nombreArchivo = 'caso_' . auth()->id() . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('archivos', $nombreArchivo);

        $insertedId = \DB::table('casos')->insertGetId([
            'idUser' => auth()->id(),
            'tipo' => $request->tipo,
            'localidad' => $request->localidad,
            'region' => 1,
            'comuna' => 1,
            'direccion' => $request->direccion,
            'asunto' => $request->asunto,
            'descripcion' => $request->descripcion,
            'archivo' => $nombreArchivo,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if ($insertedId) {
            // El insert fue exitoso
            return response()->json([
                'success' => true,
                'message' => '¡El formulario se ha enviado correctamente y el archivo se ha subido!'
            ]);
        } else {
            // El insert falló
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el formulario en la base de datos.'
            ], 500); // 500 es el código de estado para errores internos del servidor
        }
    }
    
    public function ingresoCaso()
    {
        return view('ingresoCaso');
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