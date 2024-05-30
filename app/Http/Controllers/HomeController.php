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
use App\Models\ListadoFondos;
use Illuminate\Support\Facades\Hash;
use App\Models\PostulacionPresupuestos;
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
        $currentDate = Carbon::now();
        $isVigente = ListadoFondos::where('vigencia', 1)
                              ->where('fecha_termino', '>=', $currentDate)
                              ->exists();

        $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

        $user=$user[0];

        return view('postularFondos',['user' => $user, 'isVigente' => $isVigente]);
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

     public function crearCaso(Request $request)
    {
        $validator = Casos::validar($request->all());

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $insertedId = Casos::crearCaso($request);

        if ($insertedId) {
            return response()->json([
                'success' => true,
                'message' => '¡El formulario se ha enviado correctamente y el archivo se ha subido!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al guardar el formulario en la base de datos.'
            ], 500);
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

    public function clausulaProyecto()
    {
        return view('clausulaProyecto');
    } 

    public function clausulaFondo()
    {
        return view('clausulaFondo');
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

        if($id_val==5){

            $validator = Validator::make($request->all(), [
            'rut_juridico' => 'required|string|max:255|unique:persona_juridicas,rut',
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

                $dataPerJur = PersonaJuridicas::prepararDatos($request);
                $personaJurId = PersonaJuridicas::insertarDatos($dataPerJur);

                $dataPostProy = PostulacionProyectos::prepararDatos($request);
                $insertedId = PostulacionProyectos::crearPostulacionFondos($dataPostProy,$personaJurId);

                if ($insertedId) {
                    return response()->json([
                        'status' => true,
                        'success' => true,
                        'message' => 'El registro se ha insertado correctamente con el ID: ' . $insertedId
                    ]);
                } else {
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

        if($id_val==4){
             try {

                $validator = Validator::make($request->all(), [
                        'persona_juridica_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()->toArray()
                    ]);
                }

                $personaJurId = $request->persona_juridica_id;    
                $dataPostProy = PostulacionProyectos::prepararDatos($request);
                $insertedId = PostulacionProyectos::crearPostulacionFondos($dataPostProy,$personaJurId);

            if ($insertedId) {
                return response()->json([
                    'status' => true,
                    'success' => true,
                    'message' => 'El registro se ha insertado correctamente con el ID: ' . $insertedId
                ]);
            } else {
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
            $validator = PostulacionProyectos::validarEtapa1($request->all());
        }

        if($id_val==2){
            $validator = PostulacionProyectos::validarEtapa2($request->all());
        }

        if($id_val==3){
            $validator = PostulacionProyectos::validarEtapa3($request->all());
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

        if($id_val==1){
            $validator = PostulacionFondos::validarEtapa1($request->all());
        }

        if($id_val==2){
            $validator = PostulacionFondos::validarEtapa2($request->all());
        }

        if($id_val==3){
            $validator = PostulacionFondos::validarEtapa3($request->all());
        }

        if($id_val==5){
            $validator = PostulacionFondos::validarEtapa5($request->all());
        }

        if($id_val==4){
            try {
                // Iniciar una transacción de base de datos
                DB::beginTransaction();
                
                    // Validar los campos de DatosOrganizaciones
                    $validator = PersonaJuridicas::validarCampos($request->all());
                    if ($validator->fails()) {
                            return response()->json([
                            'success' => false,
                            'errors' => $validator->errors()->toArray()
                            ]);
                    }

                    if($request->id_dato_organizacion){
                        $datosOrgId=$request->id_dato_organizacion;
                    }else{
                        $dataOrg = DatosOrganizaciones::prepararDatos($request);
                        $datosOrgId = DatosOrganizaciones::insertarDatos($dataOrg);
                    }

                    if($request->persona_juridica_id){
                        $personaJurId=$request->persona_juridica_id;
                    }else{
                        $dataPerJur = PersonaJuridicas::prepararDatos($request);
                        $personaJurId = PersonaJuridicas::insertarDatos($dataPerJur);
                    }
                 
                // Preparar y guardar datos de PostulacionFondos
                $fondoVigenteId = PostulacionFondos::fondoVigenteId();     

                $dataPosFon = PostulacionFondos::prepararDatos($request);
                $postulacionId = PostulacionFondos::crearPostulacionFondos($dataPosFon, $datosOrgId, $personaJurId, $request,$fondoVigenteId);

                $dataPrefon = PostulacionPresupuestos::prepararDatos($request);
                $postulacionPreId=PostulacionPresupuestos::crearPresupuestos($dataPrefon,$postulacionId);

                // Si todos los inserts fueron exitosos, hacer commit de la transacción
                DB::commit();

                // Devolver una respuesta JSON indicando el éxito
                return response()->json([
                    'status' => true,
                    'success' => true,
                    // 'message' => 'El registro se ha insertado correctamente con el ID: ' . $postulacionId
                ]);
            } catch (\Exception $e) {
                // En caso de error, hacer rollback de la transacción
                DB::rollBack();

                // Capturar y manejar cualquier excepción
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear persona jurídica: ' . $e->getMessage()
                ], 500); // 500 es el código de estado para errores internos del servidor
            } catch (ValidationException $e) {
                // En caso de error de validación, devolver los errores de validación
                return response()->json([
                    'success' => false,
                    'errors' => $e->validator->errors()->toArray()
                ]);
            }             

        } 
        
         if($id_val==6){
            try {
                // Iniciar una transacción de base de datos
                DB::beginTransaction();
                
                    // Validar los campos de DatosOrganizaciones
                    $validator = Validator::make($request->all(), [
                        'persona_juridica_id' => 'required',
                        ]);

                    if ($validator->fails()) {
                            return response()->json([
                            'success' => false,
                            'errors' => $validator->errors()->toArray()
                            ]);
                    }

                    if($request->id_dato_organizacion){
                        $datosOrgId=$request->id_dato_organizacion;
                    }else{
                        $dataOrg = DatosOrganizaciones::prepararDatos($request);
                        $datosOrgId = DatosOrganizaciones::insertarDatos($dataOrg);
                    }

                    if($request->persona_juridica_id){
                        $personaJurId=$request->persona_juridica_id;
                    }
                 
                // Preparar y guardar datos de PostulacionFondos
                $fondoVigenteId = PostulacionFondos::fondoVigenteId();    

                $dataPosFon = PostulacionFondos::prepararDatos($request);
                $postulacionId = PostulacionFondos::crearPostulacionFondos($dataPosFon, $datosOrgId, $personaJurId, $request,$fondoVigenteId);

                $dataPrefon = PostulacionPresupuestos::prepararDatos($request);
                $postulacionPreId=PostulacionPresupuestos::crearPresupuestos($dataPrefon,$postulacionId);

                // Si todos los inserts fueron exitosos, hacer commit de la transacción
                DB::commit();

                // Devolver una respuesta JSON indicando el éxito
                return response()->json([
                    'status' => true,
                    'success' => true,
                    // 'message' => 'El registro se ha insertado correctamente con el ID: ' . $postulacionId
                ]);
            } catch (\Exception $e) {
                // En caso de error, hacer rollback de la transacción
                DB::rollBack();

                // Capturar y manejar cualquier excepción
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear persona jurídica: ' . $e->getMessage()
                ], 500); // 500 es el código de estado para errores internos del servidor
            } catch (ValidationException $e) {
                // En caso de error de validación, devolver los errores de validación
                return response()->json([
                    'success' => false,
                    'errors' => $e->validator->errors()->toArray()
                ]);
            }             

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


    public function obtenerPersonasJuridicas()
    {
        $user = Auth::user();
           $pjuridicas = PersonaJuridicas::where('user_id', $user->id)
                ->select('id', 'razon_social')
                ->get();

                // dd($pjuridicas);
        return response()->json($pjuridicas);
    }

    public function obtenerOrganizaciones()
    {
        $user = Auth::user();
        $organizaciones = DatosOrganizaciones::where('user_id', $user->id)
                ->select('id', 'nombre_organizacion')
                ->get();

                // dd($pjuridicas);
        return response()->json($organizaciones);
    }


    
}