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

        $listados = ListadoFondos::all();

        return view('listarFondosConcursables', compact('listados'));
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

        // dd($caso->estado);

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
            'respuesta' => 'required|string|max:1500',
            // 'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480',
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

                $email = Casos::casosEmail($request->casoId);

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

    public function cambiarComuna()
    {    
        $user = auth()->user();
    
        if ($user->rol == 1) {
            if ($user->zona === 1) {
                $user->zona = 2;
            } elseif ($user->zona === 2) {
                $user->zona = 1;
            }

            $user->save();

            return response()->json(['success' => true, 'message' => '¡La comuna ha sido cambiada correctamente!']);
        } else {

            return response()->json(['success' => false, 'message' => 'No tienes permiso para cambiar la comuna.']);
        }
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
            'respuesta' => 'required|string|max:1500',
            'estado_proyecto' => 'required',
            // 'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480', 
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

                $email = PostulacionProyectos::proyectosEmail($request->pproy_id);

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
            // 'calificar' => 'required',
            'respuesta' => 'required|string|max:1500',
            'estado_fondo' => 'required',
            // 'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
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

                $email = PostulacionFondos::fondosEmail($request->pfondo_id);

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

    public function frmCrearAFondo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_fondo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1500',
            'zona' => 'required',
            'fecha_inicio' => 'required|date|before:fecha_termino',
            'fecha_termino' => 'required|date',
            'estado' => 'required'
        ], [
            'nombre_fondo.required' => 'El campo nombre fondo es obligatorio.',
            'nombre_fondo.string' => 'El campo nombre fondo debe ser una cadena de texto.',
            'nombre_fondo.max' => 'El campo nombre fondo no debe exceder los 255 caracteres.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'descripcion.max' => 'El campo descripción no debe exceder los 255 caracteres.',
            'zona.required' => 'El campo comuna es obligatorio.',
            'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio.',
            'fecha_inicio.date' => 'El campo fecha de inicio debe ser una fecha válida.',
            'fecha_inicio.before' => 'La fecha de inicio no puede ser mayor ni igual a la fecha de término.',
            'fecha_termino.required' => 'El campo fecha de término es obligatorio.',
            'fecha_termino.date' => 'El campo fecha de término debe ser una fecha válida.',
            'estado.required' => 'El campo estado es obligatorio.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $insertedId = listadoFondos::crearFondo($request);

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

    public function listarEdicionTFondos()
    {
        $listado = TituloFondos::all();
        foreach ($listado as $fondo) {
            $fondo->link_modal = '<div class="text-center"><button type="button" class="btn btn-primary verDetallesTitulo" data-bs-toggle="modal" data-bs-target="#editarTFondoModal" data-id="'.$fondo->id.'">Ver Detalles</button><div>';
        }

        return response()->json($listado);
    }

    public function listarEdicionFondos()
    {
        $listado = ListadoFondos::all();
        foreach ($listado as $fondo) {
            $fondo->fecha_inicio = Carbon::parse($fondo->fecha_inicio)->format('d-m-Y');
            $fondo->fecha_termino = Carbon::parse($fondo->fecha_termino)->format('d-m-Y');
            $fondo->link_modal = '<div class="text-center"><button type="button" class="btn btn-primary verDetallesFondo" data-bs-toggle="modal" data-bs-target="#editarFondoModal" data-id="'.$fondo->id.'">Ver Detalles</button><div>';
            $fondo->zona = ($fondo->zona == 1) ? 'Taltal' : 'Cabildo';
            $fondo->estado = ($fondo->estado == 1) ? 'Activo' : 'Inactivo';
        }

        return response()->json($listado);
    }

    public function getFondo(Request $request)
    {
       $fondo = ListadoFondos::find($request->id);

        if ($fondo) {
            $fondo->fecha_inicio = Carbon::parse($fondo->fecha_inicio)->format('d-m-Y');
            $fondo->fecha_termino = Carbon::parse($fondo->fecha_termino)->format('d-m-Y');
            return response()->json($fondo);
        } else {
            return response()->json(['error' => 'Fondo no encontrado'], 404);
        }
    }

    public function updateAFondo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fondo_id' => 'required|exists:listado_fondos,id',
            'nombre_fondo_edit' => 'required|string|max:255',
            'descripcion_edit' => 'required|string|max:1500',
            'zona_edit' => 'required',
            'fecha_inicio_edit' => 'required|date|before:fecha_termino_edit',
            'fecha_termino_edit' => 'required|date',
            'estado_edit' => 'required'
        ], [
            'nombre_fondo_edit.required' => 'El campo nombre fondo es obligatorio.',
            'zona.required' => 'El campo comuna es obligatorio.',
            'descripcion_edit.required' => 'El campo descripción es obligatorio.',
            'zona_edit.required' => 'El campo fecha inicio es obligatorio.',
            'fecha_inicio_edit.required' => 'El campo fecha inicio es obligatorio.',
            'fecha_inicio_edit.date' => 'El campo fecha inicio debe ser una fecha válida.',
            'fecha_inicio_edit.before' => 'La fecha de inicio no puede ser mayor ni igual a la fecha de término.',
            'fecha_termino_edit.required' => 'El campo fecha termino es obligatorio.',
            'fecha_termino_edit.date' => 'El campo fecha termino debe ser una fecha válida.',
            'estado_edit.required' => 'El campo estado es obligatorio.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->toArray()
            ]);
        }

        $fondo = ListadoFondos::find($request->fondo_id);

        $fecha_inicio_formatted = date('Y-m-d', strtotime($request->fecha_inicio_edit));
        $fecha_termino_formatted = date('Y-m-d', strtotime($request->fecha_termino_edit));
       
        if ($fondo) {
            $fondo->nombre_fondo = $request->nombre_fondo_edit;
            $fondo->descripcion = $request->descripcion_edit;
            $fondo->zona = $request->zona_edit;
            $fondo->fecha_inicio = $fecha_inicio_formatted;
            $fondo->fecha_termino =$fecha_termino_formatted;
            $fondo->estado = $request->estado_edit;
            $fondo->save();

            return response()->json([
                'message' => 'Fondo actualizado con éxito',
                'status' => true,
                'success' => true
                ],200);

        } else {
            return response()->json(['error' => 'Fondo no encontrado'], 404);
        }
    }
}
