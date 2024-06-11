<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\View\View;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Regiones;
use App\Models\Comunas;
use App\Models\Casos;
use App\Models\PuntajeUser;
use App\Models\PostulacionProyectos;
use App\Models\PostulacionFondos;
use App\Models\TituloFondos;
use App\Models\ListadoFondos;
use App\Models\PersonaJuridicas;
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

    public function crearFondoConcursable()
    {
        return view('crearFondoConcursable');
    }

    public function listarFondosConcursables()
    {
        $titulos = TituloFondos::orderBy('id', 'desc')->get();

        $listados = ListadoFondos::all();

        return view('listarFondosConcursables', compact('titulos', 'listados'));
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
        $caso = Casos::respuestaCasoAdmin($id);

        $acceso = User::acceso($caso);
 
        return view('respuestaCasoAdmin', compact('caso','acceso'));
    }

    public function respuestaFondoAdmin($id)
    {
        $pfondo = PostulacionFondos::respuestaFondoAdmin($id); 

        $acceso = User::acceso($pfondo);

        return view('respuestaFondoAdmin',['pfondo' => $pfondo,'acceso' => $acceso]);
    }

    public function responderCaso($id)
    {
        $caso = Casos::responderCaso($id);
        
        $acceso = User::acceso($caso);

        return view('responderCaso', compact('caso','acceso'));
    }
    
    public function casosUsuarioAdmin()
    {
        $casos = Casos::casosUsuarioAdmin();

        return response()->json($casos);
    }

    public function cerrarCaso(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'respuesta' => 'required|string|max:2500',
            'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {

            $caso = Casos::cerrarCaso($request);          

            if ($caso) {
                return response()->json([
                    'status' => true,
                    'success' => true,
                    // 'message' => 'El registro se ha insertado correctamente con el ID: ' . $postulacionId
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al actualizar la respuesta y el archivo.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    public function verPerfil()
    {
        $user = User::verPerfil();
        
        return view('verPerfil',['user' => $user]);
    }

    public function detalleUser($id)
    {
        $user = User::detalleUser($id);
        $pfondos = PostulacionFondos::getPostFondos($id);
        $pproy = PostulacionProyectos::getPostProy($id);
        $casos = Casos::getCasosUsu($id);
        $acceso = User::acceso($user);
        return view('detalleUsuario',[
            'user' => $user, 
            'pfondos' => $pfondos,
            'pproy' => $pproy,
            'casos' => $casos,
            'acceso' => $acceso
        ]);
    }

    public function cambiarPassAdmin()
    {
        return view('cambiarPassAdmin');
    } 

    public function confirmacionPassAdmin()
    {
        return view('confirmacionPassAdmin');
    }

    public function confirmacionAsignacion()
    {
        return view('confirmacionAsignacion');
    }

    public function confirmacionProyectoAdmin()
    {
        return view('confirmacionProyectoAdmin');
    }

    public function confirmacionFondoAdmin()
    {
        return view('confirmacionFondoAdmin');
    }
    
    public function confirmacionRespuestaCaso()
    {
        return view('confirmacionRespuestaCaso');
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
            'different:current_password',
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

        $user = auth()->user();

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['success' => true, 'message' => '¡La contraseña ha sido cambiada correctamente!']);
    }

    public function getData()
    {
        $data = User::getData();
        
        return response()->json($data);
    }

    public function guardarPuntaje(Request $request)
    {
        $userId = $request->user_id;

        $puntajeUser = PuntajeUser::where('user_id', $userId)->first();

        if ($puntajeUser) {
            $puntajeUser->update($request->all());
        } else {
            PuntajeUser::create($request->all());
        }

        return response()->json(['success' => true, 'message' => 'Puntaje guardado exitosamente']);
    }

    public function listarFondosAdmin()
    {
        $postulacion = ListadoFondos::listarFondosAdmin();
        return response()->json($postulacion);
    }    

    public function listarApoyoProyectosAdmin()
    {
        $postulacion = PostulacionProyectos::listarApoyoProyectosAdmin();
        return response()->json($postulacion);
    }   

    public function detalleFondoAdmin($id)
    {
        $pfondo = PostulacionFondos::detalleFondoAdmin($id);

        $acceso = User::acceso($pfondo);

        return view('detalleFondoAdmin',['pfondo' => $pfondo,'acceso' => $acceso]);
    }

    public function detalleProyectoAdmin($id)
    {
        $pproy = PostulacionProyectos::detalleProyectoAdmin($id);
        $acceso = User::acceso($pproy);

        return view('detalleProyectoAdmin',['pproy' => $pproy,'acceso' => $acceso]);
    }

     public function respuestaProyectoAdmin($id)
    {
        $pproy = PostulacionProyectos::respuestaProyectoAdmin($id);
        $acceso = User::acceso($pproy);

        return view('respuestaProyectoAdmin',['pproy' => $pproy,'acceso' => $acceso]);
    }

    public function cerrarProyecto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'respuesta' => 'required|string|max:2500',
            'estado_proyecto' => 'required',
            'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {
           
            $updateId= PostulacionProyectos::cerrarPostulacion($request);

            if ($updateId) {
                return response()->json([
                    'success' => true,
                    'message' => '¡La respuesta y el archivo se han actualizado correctamente!'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al actualizar la respuesta y el archivo.'
                ], 500); 
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    public function registrarUsuAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'rut' => 'required|string|max:255|unique:users,rut',
            'email' => 'required|string||email||max:255|unique:users,email',
            'telefono' => 'required|string|max:255',
            'zona' => 'required|string|max:255',
            'password' => 'required|string|max:2500|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {
       
            $user = User::registrarUsuAdmin();

            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Usuario creado con éxito'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al actualizar la respuesta y el archivo.'
                ], 500); 
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    public function listarUsuariosAdmin()
    {
        $users = User::listarUsuariosAdmin();

        return response()->json($users);
    }

    public function getUserDetails(Request $request)
    {
        $user = User::findOrFail($request->id);
        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
    {
        $rules = [
            'modalUserName' => 'required|string|max:255',
            'modalUserApellidoPaterno' => 'required|string|max:255',
            'modalUserApellidoMaterno' => 'required|string|max:255',
            'modalUserRut' => 'required|string|max:255|unique:users,rut,' . $id,
            'modalUserEmail' => 'required|string|email|max:255|unique:users,email,'. $id,
            'modalUserTelefono' => 'required|string|max:255',
            'modalUserZona' => 'required|string|max:255',
        ];

        if ($request->filled('modalUserPassword')) {
            $rules['modalUserPassword'] = 'required|string|min:8|max:15';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {
       
            $user = User::updateUser($id,$request);

            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Usuario actualizado con éxito'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al actualizar la respuesta y el archivo.'
                ], 500); 
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    public function cerrarFondo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'calificar' => 'required',
            'respuesta' => 'required|string|max:2500',
            'estado_fondo' => 'required',
            'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        try {

            $fondo = PostulacionFondos::cerrarFondo($request);

            if ($fondo) {
                return response()->json([
                    'success' => true,
                    'message' => '¡La respuesta y el archivo se han actualizado correctamente!'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al actualizar la respuesta y el archivo.'
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al procesar la solicitud: ' . $e->getMessage()
            ], 500);
        }
    }

    public function frmTituloFondo(Request $request)
    {
        if($request->idFrm=="frm1"){
                $validator = Validator::make($request->all(), [
                    'titulo_anual' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()->toArray()
                    ]);
                }

                $insertedId = \DB::table('titulo_fondos')->insertGetId([
                    'titulo_anual' => $request->titulo_anual,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
        }

        if($request->idFrm=="frm2"){
                $request->merge([
                    'fecha_inicio' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->fecha_inicio)->format('Y-m-d'),
                    'fecha_termino' => \Carbon\Carbon::createFromFormat('d/m/Y', $request->fecha_termino)->format('Y-m-d'),
                ]);

                $validator = Validator::make($request->all(), [
                    'nombre_fondo' => 'required|string|max:255',
                    'descripcion' => 'required|string|max:255',
                    'fecha_inicio' => 'required|date',
                    'fecha_termino' => 'required|date',
                    'titulo_anual_id' => 'required'
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()->toArray()
                    ]);
                }

            $insertedId = listadoFondos::crearFondo($request);

        }

        if ($insertedId) {
            return response()->json([
                'success' => true,
                'message' => '¡El formulario se ha enviado correctamente.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el formulario en la base de datos.'
            ], 500);
        }
    }

    public function obtenerTitulosFondos()
    {
        $titulos = TituloFondos::all();
        
        return response()->json($titulos);
    }

}
