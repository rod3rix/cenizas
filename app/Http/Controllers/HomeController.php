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
use App\Models\PersonaJuridicas;
use App\Models\PostulacionProyectos;
use App\Models\DatosOrganizaciones;
use App\Models\PostulacionFondos;
use Illuminate\Support\Facades\Hash;
use Auth;


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
  
    public function postularFondos()
    {
        $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

                $user=$user[0];

        return view('postularFondos',['user' => $user]);
    }

    public function postularProyectos()
    {
         $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

                $user=$user[0];

        return view('postularProyectos',['user' => $user]);
    }

    public function editarPerfil()
    {
        return view('editarPerfil'); 
    }

    public function seguimientoProyectos()
    {
        return view('seguimientoProyectos'); 
    }

    public function seguimientoFondos()
    {
        return view('seguimientoFondos');
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


    public function verEstadoPostulaciones()
    {
        return view('verPostulacionesProyectos');
    }

    public function graciasRegistro()
    {
        return view('graciasRegistro');
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

     public function getComunas(Request $request)
    {
        $regionId = $request->input('region_id');

        // Aquí obtienes las comunas según el ID de la región
        $comunas = Comunas::where('region_id', $regionId)->get();

        return response()->json($comunas);
    }

    public function getRegiones(Request $request)
    {
        // Obtener las regiones desde la base de datos
        $regiones = Regiones::all();

        // Devolver las regiones como respuesta JSON
        return response()->json($regiones);
    }


     public function confirmacionRespuestaCaso()
    {
        return view('confirmacionRespuestaCaso');
    }

     public function confirmacionProyecto()
    {
        return view('confirmacionProyecto');
    }

     public function casosUsuario()
    {
        $casos = Casos::where('idUser', '=', auth()->id())
                        ->join('users', 'casos.idUser', '=', 'users.id')
                        ->select('casos.*', 'users.name as nombre_usuario','casos.id as caso_id')
                        ->get();

        $casos->transform(function ($caso) {
        $caso->fecha_creacion = Carbon::parse($caso->created_at)->format('d-m-Y');
        $caso->estado = $caso->estado === null || $caso->estado == 0 ? 'ABIERTO' : 'CERRADO';
        $caso->respuesta = $caso->respuesta === null ? 'EN ESPERA' : '<a href="' . route("respuestaCaso", ['id' => $caso->caso_id]) . '">VER RESPUESTA</a>';
            return $caso;
        });

        return response()->json($casos);
    }

public function listarApoyoProyectos()
{
    $postulacion = PostulacionProyectos::where('user_id', auth()->id())->get();
       
    $postulacion = $postulacion->transform(function ($postulacion) {
    switch ($postulacion->estado) {
        case 1:
            $postulacion->estado_texto = 'Enviado';
            $postulacion->resolucion = 'En proceso';
            break;
        case 2:
            $postulacion->estado_texto = 'Aceptado';
            $postulacion->resolucion = '<a href="#">Ver Respuesta</a>';
            break;
        case 3:
            $postulacion->estado_texto = 'Rechazado';
            $postulacion->resolucion = '<a href="#">Ver Respuesta</a>';
            break;
    } 

    // Formatear la fecha created_at
    $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');
    
    return $postulacion;
    
    });

    return response()->json($postulacion);
    
}

    public function listarFondos()
    {
        $postulacion = PostulacionFondos::where('user_id', auth()->id())->get();

       
        $postulacion = $postulacion->transform(function ($postulacion) {
            switch ($postulacion->estado) {
                case 1:
                    $postulacion->estado_texto = 'Enviado';
                    $postulacion->resolucion = 'En proceso';
                    break;
                case 2:
                    $postulacion->estado_texto = 'Aceptado';
                    $postulacion->resolucion = '<a href="#">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->estado_texto = 'Rechazado';
                    $postulacion->resolucion = '<a href="#">Ver Respuesta</a>';
                    break;
            } 

            // Formatear la fecha created_at
            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');
            
            return $postulacion;
        });

    return response()->json($postulacion);
    
    }


     public function listarPersonaJuridicas()
    {
        $personaJuridicas = PersonaJuridicas::where('user_id', auth()->id())->get();

        $personaJuridicas->transform(function ($personaJuridica) {
            // Transformar los datos según sea necesario
            // Por ejemplo, puedes formatear la fecha y el estado aquí
           $personaJuridica->rut_link = '<a href="' . route("editarPersonaJuridica", ["id" => $personaJuridica->id]) . '">' . $personaJuridica->rut . '</a>';
            return $personaJuridica;
        });

    return response()->json($personaJuridicas);
    
    }

     public function guardarFrm(Request $request)
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
            'region_id' => $request->region,
            'comuna_id' => $request->comuna,
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

    public function respuestaCaso($id)
    {
        // Obtener el caso específico según el ID proporcionado en la URL
    $caso = Casos::join('users', 'casos.idUser', '=', 'users.id')
                 ->join('regiones', 'casos.region_id', '=', 'regiones.id')
                 ->join('comunas', 'casos.comuna_id', '=', 'comunas.id')
                 ->select('casos.*', 'users.*', 'regiones.nombre as region', 'comunas.nombre as comuna','casos.id as casoid')
                 ->findOrFail($id);

        // Pasar el caso a la vista 'responderCaso'
        return view('respuestaCaso', compact('caso'));
    }

    public function editarPersonaJuridica($id)
    {
        $personaJuridica = DB::table('persona_juridicas')
                ->where('id', '=', $id)
                ->get();

        $personaJuridica=$personaJuridica[0];

        return view('editarPersonaJuridica',['personaJuridica' => $personaJuridica]);
    }

    public function cambiarPass()
    {
        return view('cambiarPass');
    } 

    public function confirmacionPass()
    {
        return view('confirmacionPass');
    }

    public function confirmacionUsuario()
    {
        return view('confirmacionUsuario');
    }
    
    public function changePasswordUsu(Request $request)
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

        // Cambiar la contraseña del usuario
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Devolver una respuesta de éxito
        return response()->json(['success' => true, 'message' => '¡La contraseña ha sido cambiada correctamente!']);
    }

        public function updateProfile(Request $request)
    {
        
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) use ($user) {
                    $existingUser = \App\Models\User::where('email', $value)->first();
                    if ($existingUser && $existingUser->id !== $user->id) {
                        $fail('El correo electrónico ya está en uso.');
                    }
                },
            ],
            'fono' => [
            'required',
            'min:8',
            ],
        ]);

        if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
        ]);
        }  

        $user = auth()->user();
        $user->update($request->all());

        return response()->json(['success' => true]);
    }

     public function verPerfilUsu()
    {
       $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

                $user=$user[0];

        return view('verPerfilUsu',['user' => $user]);
    }

     public function personaJuridica()
    {
       $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

                $user=$user[0];

        return view('personaJuridica');
    }

     public function confirmacionPersonaJuridica()
    {
    
        return view('confirmacionPersonaJuridica');
    }

     public function confirmacionFondos()
    {
    
        return view('confirmacionFondos');
    }

     public function confirmacionEditarPersonaJuridica()
    {
    
        return view('confirmacionEditarPersonaJuridica');
    }    

        public function crearPersonaJuridica(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'rut' => 'required|string|max:255|unique:persona_juridicas,rut',
            'razon_social' => 'required|string|max:255',
            'relacion' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
            ]);
        }  

          try {
        // Insertar el registro y obtener el ID del nuevo registro insertado
        $insertedId = PersonaJuridicas::insertGetId([
            'user_id' => auth()->id(),
            'rut' => $request->rut,
            'razon_social' => $request->razon_social,
            'relacion' => $request->relacion,
            'estado' => $request->estado,
        ]);

        // Verificar si se obtuvo un ID válido
        if ($insertedId) {
            // El insert fue exitoso
            return response()->json([
                'success' => true,
                'message' => 'El registro se ha insertado correctamente con el ID: ' . $insertedId
            ]);
        } else {
            // El insert falló
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el formulario en la base de datos.'
            ], 500); // 500 es el código de estado para errores internos del servidor
        }
    } catch (\Exception $e) {
        // Capturar y manejar cualquier excepción
        return response()->json([
            'success' => false,
            'message' => 'Error al crear persona jurídica: ' . $e->getMessage()
        ], 500);
    }

}

public function actualizarPersonaJuridica(Request $request)
{
    
    $validator = Validator::make($request->all(), [
            'razon_social' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
            ]);
    }  


    try {
    // Validar los datos
    $validatedData = $request->validate([
        'razon_social' => 'required|string|max:255',
        // Agrega otras reglas de validación si es necesario
    ]);

    // Obtener el ID de la persona jurídica
    $personaJuridica_id = $request->personaJuridica_id;

    // Actualizar los campos en la base de datos
    PersonaJuridicas::where('id', $personaJuridica_id)->update([
        'razon_social' => $validatedData['razon_social'],
        'relacion' => $request->relacion,
        'estado' => $request->estado,
        // Otros campos si es necesario
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Los datos se actualizaron correctamente'], 200);
    } catch (\Exception $e) {
    return response()->json(['error' => 'Error al actualizar los datos'], 500);
    }
}

    public function validarFrmProy(Request $request)
    {
        $id_val=$request->id;

         if($id_val==4){
             try {
        // Insertar el registro y obtener el ID del nuevo registro insertado
        $insertedId = PostulacionProyectos::insertGetId([
            'user_id' => auth()->id(),
            'nacionalidad' => $request->nacionalidad,
            'genero' => $request->genero,
            'pueblo_originario' => $request->pueblo_originario,
            'discapacidad' => $request->discapacidad,
            'fecha_nacimiento' => $fecha_nacimiento_formatted = date('Y-m-d', strtotime($request->fecha_nacimiento)),
            'actividad_economica' => $request->actividad_economica,
            'direccion' => $request->direccion,
            'formacion_formal' => $request->formacion_formal,  
            'profesion' => $request->profesion, 
            'acepto_clausula' => $request->acepto_clausula,
            'nombre_organizacion' => $request->nombre_organizacion,
            'rut_organizacion' => $request->rut_organizacion,
            'domicilio_organizacion' => $request->domicilio_organizacion,
            'personalidad_juridica' => $request->personalidad_juridica,
            'antiguedad_anos' => $request->antiguedad_anos,
            'numero_socios' => $request->numero_socios,
            'nombre_proyecto' => $request->nombre_proyecto,
            'tipo_proyecto' => $request->tipo_proyecto,
            'lugar_proyecto' => $request->lugar_proyecto,
            'directos' => $request->directos,
            'indirectos' => $request->indirectos,
            'aporte_solicitado' => $request->aporte_solicitado,
            'acepto_clausula_proy' => $request->acepto_clausula_proy,
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
            // Verificar si se obtuvo un ID válido
            if ($insertedId) {
                // El insert fue exitoso
                return response()->json([
                    'status' => true,
                    'success' => true,
                    'message' => 'El registro se ha insertado correctamente con el ID: ' . $insertedId
                ]);
            } else {
                // El insert falló
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al guardar el formulario en la base de datos.'
                ], 500); // 500 es el código de estado para errores internos del servidor
            }
        } catch (\Exception $e) {
            // Capturar y manejar cualquier excepción
            return response()->json([
                'success' => false,
                'message' => 'Error al crear persona jurídica: ' . $e->getMessage()
            ], 500);
        }

        }   

        if($id_val==1){
            $validator = Validator::make($request->all(), [
            'nacionalidad' => 'required',
            'genero' => 'required',
            'pueblo_originario' => 'required',
            'discapacidad' => 'required',
            'fecha_nacimiento' => 'required',
            'actividad_economica' => 'required',
            'direccion' => 'required',
            'formacion_formal' => 'required',  
            'profesion' => 'required', 
            'acepto_clausula' => 'required',
            ]);
        }

        if($id_val==2){
            $validator = Validator::make($request->all(), [
            'nombre_organizacion' => 'required',
            'rut_organizacion' => 'required',
            'domicilio_organizacion' => 'required',
            'personalidad_juridica' => 'required',
            'antiguedad_anos' => 'required',
            'numero_socios' => 'required',
            ]);
        }

        if($id_val==3){
            $validator = Validator::make($request->all(), [
            'nombre_proyecto' => 'required',
            'tipo_proyecto' => 'required',
            'lugar_proyecto' => 'required',
            'directos' => 'required',
            'indirectos' => 'required',
            'aporte_solicitado' => 'required',
            'acepto_clausula_proy' => 'required',
            ]);
        }
            
        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
            ]);
        }else{
            return response()->json([
            'success' => true,
            ]);
        }
    }

    public function validarFrmFondos(Request $request)
    {
        $id_val=$request->id;

         if($id_val==4){
             try {

        $validator = Validator::make($request->all(), [
            'rut_juridico' => 'required',
            'razon_social' => 'required',
            'relacion' => 'required',
            'estado' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
            ]);
        }    


        // Insertar el registro y obtener el ID del nuevo registro insertado
        $datosOrgId = DatosOrganizaciones::insertGetId([
            'user_id' => auth()->id(),
            'nombre_organizacion' => $request->nombre_organizacion,
            'domicilio_organizacion' => $request->domicilio_organizacion,
            'rut_organizacion' => $request->rut_organizacion,            
            'personalidad_juridica' => $request->personalidad_juridica,
            'antiguedad_anos' => $request->antiguedad_anos,
            'numero_socios' => $request->numero_socios,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

         // Insertar el registro y obtener el ID del nuevo registro insertado
        $personaJurId = PersonaJuridicas::insertGetId([
            'user_id' => auth()->id(),
            'rut' => $request->rut_juridico,
            'razon_social' => $request->razon_social,
            'relacion' => $request->relacion,
            'estado' => $request->estado,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);

        $archivo_anexo = $request->file('archivo_anexo');
        // Guardar el archivo en el directorio deseado
        $nombreArchivoAnexo = 'Fondo_anexo_' . auth()->id() . "_" . date('Ymd_His') . "." . $archivo_anexo->getClientOriginalExtension();
        $archivo_anexo->storeAs('archivos', $nombreArchivoAnexo);

        $archivo_certificado = $request->file('archivo_certificado');
        // Guardar el archivo en el directorio deseado
        $nombreArchivoCert = 'Fondo_certificado_' . auth()->id() . "_" . date('Ymd_His') . "." . $archivo_certificado->getClientOriginalExtension();
        $archivo_certificado->storeAs('archivos', $nombreArchivoCert);

        // Insertar el registro y obtener el ID del nuevo registro insertado
        $insertedId = PostulacionFondos::insertGetId([
            'user_id' => auth()->id(),
            'id_fondo_concursable' => 1, 
            'nacionalidad' => $request->nacionalidad,
            'genero' => $request->genero,
            'pueblo_originario' => $request->pueblo_originario, 
            'discapacidad' => $request->discapacidad,
            'fecha_nacimiento' => $fecha_nacimiento_formatted = date('Y-m-d', strtotime($request->fecha_nacimiento)),
            'actividad_economica' => $request->actividad_economica,
            'direccion' => $request->direccion,
            'formacion_formal' => $request->formacion_formal,
            'profesion' => $request->profesion,
            'acepto_clausula' => $request->acepto_clausula,
            'id_dato_organizacion' => $datosOrgId,
            'nombre_proyecto' => $request->nombre_proyecto,
            'equipamiento' => $request->equipamiento,
            'fundamentacion' => $request->fundamentacion,
            'descripcion_proyecto' => $request->descripcion_proyecto,
            'objetivo_general' => $request->objetivo_general,
            'objetivos_especificos' => $request->objetivos_especificos,
            'cierre_proyecto' => $request->cierre_proyecto,
            'directos' => $request->directos,
            'indirectos' => $request->indirectos,
            'fecha_inicio' =>  $fecha_inicio_formatted = date('Y-m-d', strtotime($request->fecha_inicio)),
            'fecha_termino' => $fecha_termino_formatted = date('Y-m-d', strtotime($request->fecha_termino)),
            'cantidad_dias' => $request->cantidad_dias,
            'aporte_solicitado' => $request->aporte_solicitado,
            'aporte_terceros' => $request->aporte_terceros,
            'aporte_propio' => $request->aporte_propio,
            'archivo_anexo' => $archivo_anexo,
            'archivo_certificado' => $archivo_certificado,
            'id_persona_juridica' => $personaJurId,
            'estado' => 1,
            ///'respuesta' => $request->respuesta,
            //'archivo_respuesta' => $request->archivo_respuesta,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        
            // Verificar si se obtuvo un ID válido
            if ($insertedId) {
                // El insert fue exitoso
                return response()->json([
                    'status' => true,
                    'success' => true,
                    'message' => 'El registro se ha insertado correctamente con el ID: ' . $insertedId
                ]);
            } else {
                // El insert falló
                return response()->json([
                    'success' => false,
                    'message' => 'Hubo un error al guardar el formulario en la base de datos.'
                ], 500); // 500 es el código de estado para errores internos del servidor
            }
        } catch (\Exception $e) {
            // Capturar y manejar cualquier excepción
            return response()->json([
                'success' => false,
                'message' => 'Error al crear persona jurídica: ' . $e->getMessage()
            ], 500);
        }

        }   

        if($id_val==1){
            $validator = Validator::make($request->all(), [
            'nacionalidad' => 'required',
            'genero' => 'required',
            'pueblo_originario' => 'required',
            'discapacidad' => 'required',
            'fecha_nacimiento' => 'required',
            'actividad_economica' => 'required',
            'direccion' => 'required',
            'formacion_formal' => 'required',  
            'profesion' => 'required', 
            'acepto_clausula' => 'required',
            ]);
        }

        if($id_val==2){
            $validator = Validator::make($request->all(), [
            'nombre_organizacion' => 'required',
            'rut_organizacion' => 'required',
            'domicilio_organizacion' => 'required',
            'personalidad_juridica' => 'required',
            'antiguedad_anos' => 'required',
            'numero_socios' => 'required',
            ]);
        }

        if($id_val==3){
            $validator = Validator::make($request->all(), [
            'nombre_proyecto' => 'required',
            'equipamiento' => 'required',
            'fundamentacion' => 'required',
            'descripcion_proyecto' => 'required',
            'objetivo_general' => 'required',
            'objetivos_especificos' => 'required',
            'cierre_proyecto' => 'required',
            'directos' => 'required',
            'indirectos' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'cantidad_dias' => 'required',
            'aporte_solicitado' => 'required',
            'aporte_terceros' => 'required',
            'aporte_propio' => 'required',
            'archivo_anexo' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
            'archivo_certificado' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
            ]);
        }
            
        if ($validator->fails()) {
            return response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray()
            ]);
        }else{
            return response()->json([
            'success' => true,
            ]);
        }
    }
}