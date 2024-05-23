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
        // Obtener todos los títulos de fondos
        $titulos = TituloFondos::all();

        // Obtener todos los listados de fondos
        $listados = ListadoFondos::all();

    // Pasar los datos a la vista
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

    public function detalleUser($id)
    {

        $user = DB::table('users')
            ->leftJoin('puntaje_users', 'users.id', '=', 'puntaje_users.user_id')
            ->select('users.*', 'puntaje_users.influencia', 'puntaje_users.vecindad', 'puntaje_users.vecindad_mlc', 'puntaje_users.poder')
            ->where('users.id', $id)
            ->first();

        return view('detalleUsuario',['user' => $user]);
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


    public function getData()
    {
      $zona = auth()->user()->zona;

    // Realizar la consulta con el filtro por zona
        $data = DB::table('users')
            ->leftJoin('puntaje_users', 'users.id', '=', 'puntaje_users.user_id')
            ->select(
        'users.*',
        DB::raw('COALESCE(puntaje_users.influencia, 0) as influencia'),
        DB::raw('COALESCE(puntaje_users.vecindad, 0) as vecindad'),
        DB::raw('COALESCE(puntaje_users.vecindad_mlc, 0) as vecindad_mlc'),
        DB::raw('COALESCE(puntaje_users.poder, 0) as poder')
    )
    ->where('users.zona', $zona)  // Filtrar por zona
    ->where('users.rol', 0)
    ->where('users.type', 1)
    ->get();

    // Transformar los datos antes de enviarlos
    $data->transform(function ($user) {
        // Aplicar formato al campo 'rut'
        $user->rut = $this->formatRut($user->rut);
        // Agregar el enlace con el ID del usuario
        $user->user_id_link = '<a href="' . route("detalleUser", ["id" => $user->id]) . '">' . $user->id . '</a>';
        return $user;
    }); 


            return response()->json($data);
}

    // Función para dar formato al rut
private function formatRut($rut)
{
    // Implementa aquí tu lógica para formatear el rut, por ejemplo, agregando los puntos y el guión
    // Aquí hay un ejemplo básico de formateo:
    return substr($rut, 0, -1).substr($rut, -1);
}

public function guardarPuntaje(Request $request)
    {
        // Obtener el usuario actual autenticado (o el usuario que corresponda)
        $userId = $request->user_id;

        // Buscar si el usuario ya tiene un registro en la tabla puntaje_user
        $puntajeUser = PuntajeUser::where('user_id', $userId)->first();

        // Si el usuario ya tiene un registro, actualizarlo; de lo contrario, crear uno nuevo
        if ($puntajeUser) {
            $puntajeUser->update($request->all());
        } else {
            //$request->merge(['user_id' => $userId]);
            PuntajeUser::create($request->all());
        }

        // Devolver una respuesta de éxito
        return response()->json(['success' => true, 'message' => 'Puntaje guardado exitosamente']);
    }

       public function listarFondosAdmin()
    {
        
        $postulacion = PostulacionFondos::join('users', 'postulacion_fondos.user_id', '=', 'users.id')->get(['postulacion_fondos.*', 'users.*','postulacion_fondos.id']);

        $postulacion = $postulacion->transform(function ($postulacion) {
            switch ($postulacion->estado) {
                case 1:
                    $postulacion->calificacion = '<a href="#">Calificar</a>';
                    $postulacion->estado = 'En proceso';
                    $postulacion->respuesta = '<a href="' . route("detalleFondoAdmin", ["id" => $postulacion->id]) . '">Responder</a>';
                    break;
                case 2:
                    $postulacion->calificacion = '<a href="#">Ver Calificación</a>';
                    $postulacion->estado = 'Enviado';
                    $postulacion->respuesta = '<a href="#">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->calificacion = '<a href="#">Ver Calificación</a>';
                    $postulacion->estado = 'Enviado';
                    $postulacion->respuesta = '<a href="#">Ver Respuesta</a>';
                    break;
            } 

            // Formatear la fecha created_at
            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');
            
            return $postulacion;
        });

         return response()->json($postulacion);
    
    }    

       public function listarApoyoProyectosAdmin()
    {
        $postulacion = PostulacionProyectos::join('users', 'postulacion_proyectos.user_id', '=', 'users.id')->get(['postulacion_proyectos.*', 'users.*','postulacion_proyectos.id']);

        $postulacion = $postulacion->transform(function ($postulacion) {
            switch ($postulacion->estado) {
                case 1:
                    $postulacion->calificacion = '<a href="#">Calificar</a>';
                    $postulacion->estado = 'En proceso';
                    $postulacion->respuesta = '<a href="' . route("detalleProyectoAdmin", ["id" => $postulacion->id]) . '">Responder</a>';
                    break;
                case 2:
                    $postulacion->calificacion = '<a href="#">Ver Calificación</a>';
                    $postulacion->estado = 'Enviado';
                    $postulacion->respuesta = '<a href="#">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->calificacion = '<a href="#">Ver Calificación</a>';
                    $postulacion->estado = 'Enviado';
                    $postulacion->respuesta = '<a href="#">Ver Respuesta</a>';
                    break;
            } 

            // Formatear la fecha created_at
            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');
            
            return $postulacion;
        });

         return response()->json($postulacion);
    
    }   

      public function detalleFondoAdmin($id)
    {

        $pfondo = DB::table('postulacion_fondos')
            ->join('users', 'users.id', '=', 'postulacion_fondos.user_id')
            ->select('users.*','postulacion_fondos.*')
            ->where('postulacion_fondos.id', $id)
            ->first();

        return view('detalleFondoAdmin',['pfondo' => $pfondo]);
    } 

     public function detalleProyectoAdmin($id)
    {

        $pproy = DB::table('postulacion_proyectos')
            ->join('users', 'users.id', '=', 'postulacion_proyectos.user_id')
            ->select('users.*','postulacion_proyectos.*')
            ->where('postulacion_proyectos.id', $id)
            ->first();

        return view('detalleProyectoAdmin',['pproy' => $pproy]);
    }

    public function cerrarProyecto(Request $request)
    {
    // Validar la existencia y tipo del archivo
    $validator = Validator::make($request->all(), [
        'respuesta' => 'required|string|max:2500',
        'estado_proyecto' => 'required',
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
        $nombreArchivo = 'res_proy_' . auth()->id() . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('archivos', $nombreArchivo);

        // Actualizar los campos respuesta y archivo_respuesta con el ID proporcionado en el URL usando Eloquent

        $caso = PostulacionProyectos::findOrFail($request->pproy_id);
        $caso->respuesta = $request->input('respuesta');
        $caso->archivo_respuesta = $nombreArchivo;
        $caso->estado = $request->input('estado_proyecto');
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

public function registrarUsuAdmin(Request $request)
    {
    // Validar la existencia y tipo del archivo
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:2500',
        'apellido_paterno' => 'required|string|max:2500',
        'apellido_materno' => 'required|string|max:2500',
        'rut' => 'required|string|max:255|unique:users,rut',
        'email' => 'required|string||email||max:2500|unique:users,email',
        'telefono' => 'required|string|max:2500',
        'zona' => 'required|string|max:2500',
        'password' => 'required|string|max:2500|min:8'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
        ]);
    }

    try {
       
        $user = new user;
        $user->name =  $request->name;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->rut = $request->rut;
        $user->email = $request->email;
        $user->fono = $request->telefono;
        $user->zona = $request->zona;
        $user->type = 2;
        $user->password = bcrypt($request->password);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();

        // Verificar si la actualización fue exitosa
        if ($user) {
            // La actualización fue exitosa
            return response()->json([
                'success' => true,
                'message' => 'Usuario creado con éxito'
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

    public function listarUsuariosAdmin()
    {
        $users = User::where('type', 2)
            ->select('users.*')
            ->get();

        $users = $users->transform(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'apellido_paterno' => $user->apellido_paterno,
            'rut' => $user->rut,
            'link_editar' => '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-id="'.$user->id.'">Ver Detalles</button>'
            ];
        });

         return response()->json($users);
    }

    public function getUserDetails(Request $request)
    {
        $user = User::findOrFail($request->id);
        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
    {
        // Validar la existencia y tipo del archivo
            $rules = [
                'modalUserName' => 'required|string|max:2500',
                'modalUserApellidoPaterno' => 'required|string|max:2500',
                'modalUserApellidoMaterno' => 'required|string|max:2500',
                'modalUserRut' => 'required|string|max:255|unique:users,rut,' . $id,
                'modalUserEmail' => 'required|string|email|max:2500|unique:users,email,'. $id,
                'modalUserTelefono' => 'required|string|max:2500',
                'modalUserZona' => 'required|string|max:2500',
            ];

        // Agregar regla de validación para la contraseña si está presente
        if ($request->filled('modalUserPassword')) {
            $rules['modalUserPassword'] = 'required|string|min:8|max:15';
        }

        // Validar la solicitud
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $user = User::findOrFail($id);
        // Actualizar los datos del usuario
        $user->name = $request->modalUserName;
        $user->apellido_paterno = $request->modalUserApellidoPaterno;
        $user->apellido_materno = $request->modalUserApellidoMaterno;
        $user->rut = $request->modalUserRut;
        $user->email = $request->modalUserEmail;
        $user->fono = $request->modalUserTelefono;
        $user->zona = $request->modalUserZona;

        if ($request->modalUserPassword) {
            $user->password = Hash::make($request->modalUserPassword);
        }

        $user->save();

        return response()->json(['success' => true,
              'message' => 'Usuario actualizado con éxito']);
    }

    public function cerrarFondo(Request $request)
    {
    // Validar la existencia y tipo del archivo
    $validator = Validator::make($request->all(), [
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
        // Obtener el archivo del request
        $archivo = $request->file('archivo');

        // Guardar el archivo en el directorio deseado
        $nombreArchivo = 'res_fondo_' . $request->pfondo_id . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('archivos', $nombreArchivo);

        // Actualizar los campos respuesta y archivo_respuesta con el ID proporcionado en el URL usando Eloquent

        $fondo = PostulacionFondos::findOrFail($request->pfondo_id);
        $fondo->respuesta = $request->input('respuesta');
        $fondo->archivo_respuesta = $nombreArchivo;
        $fondo->estado = $request->input('estado_fondo');
        $fondo->updated_at = Carbon::now();
        $fondo->save();

        // Verificar si la actualización fue exitosa
        if ($fondo) {
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
                $validator = Validator::make($request->all(), [
                    'nombre_fondo' => 'required|string|max:255',
                    'descripcion' => 'required|string|max:255',
                    'fecha_inicio' => 'required|date',
                    'fecha_termino' => 'required|date',
                    'vigencia' => 'required',
                    'titulo_anual_id' => 'required'
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'errors' => $validator->errors()->toArray()
                    ]);
                }

                $insertedId = \DB::table('listado_fondos')->insertGetId([
                    'nombre_fondo' => $request->nombre_fondo,
                    'descripcion' => $request->descripcion,
                    'fecha_inicio' =>  $fecha_inicio_formatted = date('Y-m-d', strtotime($request->fecha_inicio)),
                    'fecha_termino' => $fecha_termino_formatted = date('Y-m-d', strtotime($request->fecha_termino)),
                    'vigencia' => $request->vigencia,
                    'titulo_anual_id'  => $request->titulo_anual_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

        }


        if ($insertedId) {
            // El insert fue exitoso
            return response()->json([
                'success' => true,
                'message' => '¡El formulario se ha enviado correctamente.'
            ]);
        } else {
            // El insert falló
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el formulario en la base de datos.'
            ], 500); // 500 es el código de estado para errores internos del servidor
        }
    }

    public function obtenerTitulosFondos()
    {
    $titulos = TituloFondos::all();
    return response()->json($titulos);
    }
}
