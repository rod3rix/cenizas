<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Regiones;
use App\Models\Comunas;
use App\Models\Casos;
use Illuminate\Support\Facades\Hash;
use Auth;


class AdminController extends Controller
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
    public function dashboard(): View
    {
        return view('admin');
    }

    public function verPostulacionesProyectos()
    {
        return view('verPostulacionesProyectos');
    }

    public function verSugerenciaReclamo()
    {
        return view('verSugerenciaReclamo'); 
    }

    public function verPostulacionesFondos()
    {
        return view('verPostulacionesFondos'); 
    }

    public function seguimientoCasosAdmin()
    {
        return view('seguimientoCasosAdmin'); 
    }

     public function seguimientoFondos()
    {
        return view('seguimientoFondos'); 
    }

    public function usuariosRegistrados()
    {
        return view('usuariosRegistrados'); 
    }
     
     public function respuestaCasoAdmin($id)
    {
        // Obtener el caso específico según el ID proporcionado en la URL
    $caso = Casos::join('users', 'casos.idUser', '=', 'users.id')
                 ->join('regiones', 'casos.region_id', '=', 'regiones.id')
                 ->join('comunas', 'casos.comuna_id', '=', 'comunas.id')
                 ->select('casos.*', 'users.*', 'regiones.nombre as region', 'comunas.nombre as comuna','casos.id as casoid')
                 ->findOrFail($id);

        // Pasar el caso a la vista 'responderCaso'
        return view('respuestaCasoAdmin', compact('caso'));
    }

      public function responderCaso($id)
    {
        // Obtener el caso específico según el ID proporcionado en la URL
    $caso = Casos::join('users', 'casos.idUser', '=', 'users.id')
                 ->join('regiones', 'casos.region_id', '=', 'regiones.id')
                 ->join('comunas', 'casos.comuna_id', '=', 'comunas.id')
                 ->select('casos.*', 'users.*', 'regiones.nombre as region', 'comunas.nombre as comuna','casos.id as casoid')
                 ->findOrFail($id);

        // Pasar el caso a la vista 'responderCaso'
        return view('responderCaso', compact('caso'));
    }
    
     public function casosUsuarioAdmin()
    {
   
        $casos = Casos::join('users', 'casos.idUser', '=', 'users.id')
                        ->select('casos.*', 'users.name as nombre_usuario','casos.id as caso_id')
                        ->get();

        $casos->transform(function ($caso) {
            $caso->fecha_creacion = Carbon::parse($caso->created_at)->format('d-m-Y');
            $caso->estado = $caso->estado === null || $caso->estado == 0 ? 'ABIERTO' : 'CERRADO';
            $caso->respuesta = $caso->respuesta === null ? '<a href="' . route("responderCaso", ['id' => $caso->caso_id]) . '">RESPONDER</a>' : '<a href="' . route("respuestaCasoAdmin", ['id' => $caso->caso_id]) . '">VER RESPUESTA</a>';
            return $caso;
        });
        return response()->json($casos);
    }

public function cerrarCaso(Request $request)
{
    // Validar la existencia y tipo del archivo
    $validator = Validator::make($request->all(), [
        'respuesta' => 'required|string|max:2500',
        'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
        ]);
    }

    try {
        // Obtener el archivo del request
        $archivo = $request->file('archivo');

        // Guardar el archivo en el directorio deseado
        $nombreArchivo = 'res_caso_' . auth()->id() . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('archivos', $nombreArchivo);

        // Actualizar los campos respuesta y archivo_respuesta con el ID proporcionado en el URL usando Eloquent
        $caso = Casos::findOrFail($request->casoId);
        $caso->respuesta = $request->input('respuesta');
        $caso->archivo_respuesta = $nombreArchivo;
        $caso->estado = 1;
        $caso->updated_at = Carbon::now();
        $caso->save();

        // Verificar si la actualización fue exitosa
        if ($caso) {
            // La actualización fue exitosa
            return response()->json([
                'success' => true,
                'message' => '¡La respuesta y el archivo se han actualizado correctamente!'
            ]);
        } else {
            // La actualización falló
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al actualizar la respuesta y el archivo.'
            ], 500); // 500 es el código de estado para errores internos del servidor
        }
    } catch (\Exception $e) {
        // Manejar la excepción
        return response()->json([
            'success' => false,
            'message' => 'Hubo un error al procesar la solicitud: ' . $e->getMessage()
        ], 500);
    }
}

    public function verPerfil()
    {
       $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

                $user=$user[0];

        return view('verPerfil',['user' => $user]);
    }

    public function cambiarPassAdmin()
    {
        return view('cambiarPassAdmin');
    } 

    public function confirmacionPass()
    {
        return view('confirmacionPass');
    }

     public function changePassword(Request $request)
    {
            $validator = Validator::make($request->all(), [
        'current_password' => [
            'required',
            function ($attribute, $value, $fail) {
                if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $value])) {
                    $fail('La contraseña actual no es válida.');
                }
            },
        ],
        'new_password' => [
            'required',
            'string',
            'different:current_password', // Nueva regla: debe ser diferente de la contraseña actual
            'min:8',
            'confirmed',
        ],
        ], [
            'current_password.required' => 'El campo contraseña actual es obligatorio.',
            'new_password.required' => 'El campo nueva contraseña es obligatorio.',
            'new_password.different' => 'La nueva contraseña debe ser diferente de la contraseña actual.',
            'new_password.min' => 'El campo nueva contraseña debe tener al menos :min caracteres.',
            'new_password.confirmed' => 'La confirmación de la nueva contraseña no coincide.',
        ]);


        if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
        ]);
        }   

        // // Obtener el usuario autenticado
        $user = auth()->user();

        // // Verificar si la contraseña actual es válida
        // if (!Hash::check($request->current_password, $user->password)) {
        //     return response()->json(['success' => false, 'message' => 'La contraseña actual no es válida.']);
        // }

        // Cambiar la contraseña del usuario
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Devolver una respuesta de éxito
        return response()->json(['success' => true, 'message' => '¡La contraseña ha sido cambiada correctamente!']);
    }

}