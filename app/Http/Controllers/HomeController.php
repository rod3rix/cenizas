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
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PostulacionPresupuestos;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('home');
    }

    public function postularFondos()
    {
        $isVigente = ListadoFondos::fondoVigente();
        $user = User::userData();
        return view('postularFondos', [
            'user' => $user,
            'isVigente' => $isVigente
        ]);
    }

    public function postularProyectos()
    {
        $user = User::userData();
        return view('postularProyectos', ['user' => $user]);
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

    public function respuestaProyecto($id)
    {
        $pproy = PostulacionProyectos::respuestaProyectoAdmin($id);
        $acceso = User::acceso($pproy);

        return view('respuestaProyecto', ['pproy' => $pproy, 'acceso' => $acceso]);
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
        $user = User::userData();
        return view('enviarCaso', ['user' => $user]);
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

    public function getComunas(Request $request)
    {
        $regionId = $request->input('region_id');
        $comunas = Comunas::where('region_id', $regionId)->get();

        return response()->json($comunas);
    }

    public function getRegiones(Request $request)
    {
        $regiones = Regiones::all();

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
        $casos = Casos::casosUsuario();

        return response()->json($casos);
    }

    public function listarApoyoProyectos()
    {
        $postulacion = PostulacionProyectos::listarApoyoProyectos();

        return response()->json($postulacion);
    }

    public function listarFondos()
    {
        $postulacion = PostulacionFondos::listarFondos();

        return response()->json($postulacion);
    }

    public function listarPersonaJuridicas()
    {
        $personaJuridicas = PersonaJuridicas::where('user_id', auth()->id())->get();

        $personaJuridicas->transform(function ($personaJuridica) {
            $personaJuridica->rut_link = '<a href="' . route("editarPersonaJuridica", ["id" => $personaJuridica->id]) . '">' . $personaJuridica->rut . '</a>';
            return $personaJuridica;
        });

        return response()->json($personaJuridicas);
    }

    public function respuestaCaso($id)
    {
        $caso = Casos::respuestaCaso($id);
        $acceso = User::acceso($caso);

        return view('respuestaCaso', compact('caso', 'acceso'));
    }

    public function editarPersonaJuridica($id)
    {
        $personaJuridica = PersonaJuridicas::editarPersonaJuridica($id);

        return view('editarPersonaJuridica', ['personaJuridica' => $personaJuridica]);
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
                    if (!Hash::check($value, auth()->user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => 'required|min:6|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully.'
        ]);
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

        if($id_val==4){
            $validator = PostulacionFondos::validarEtapa4($request->all());
        }

        if($id_val==3){
            try {
                DB::beginTransaction();
                
                    $validator = PostulacionFondos::validarEtapa3($request->all());

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
                        $datosOrgId = DatosOrganizaciones::insertarDatos($dataOrg,$request);
                    }
                 
                $fondoVigenteId = PostulacionFondos::fondoVigenteId();
                $dataPosFon = PostulacionFondos::prepararDatos($request);
                $postulacionId = PostulacionFondos::crearPostulacionFondos($dataPosFon, $datosOrgId,$request,$fondoVigenteId);
                DB::commit();

                return response()->json([
                    'status' => true,
                    'success' => true,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();

                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear persona jurídica: ' . $e->getMessage()
                ], 500);
            } catch (ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->validator->errors()->toArray()
                ]);
            }             

        } 
        
         if($id_val==6){
            try {
                DB::beginTransaction();
                
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

    public function confirmacionFondos()
    {
        return view('confirmacionFondos');
    }

     public function respuestaFondo($id)
    {
        $pfondo = PostulacionFondos::respuestaFondoAdmin($id); 

        $acceso = User::acceso($pfondo);

        return view('respuestaFondo',['pfondo' => $pfondo,'acceso' => $acceso]);
    }

    public function validarFrmProy(Request $request)
    {
        $id_val=$request->id;

        if($id_val==1){
            $validator = PostulacionProyectos::validarEtapa1($request->all());
        }

        if($id_val==2){
            $validator = PostulacionProyectos::validarEtapa2($request->all());
        }

        if($id_val==3){

            $validator = PostulacionProyectos::validarEtapa3($request->all());

            if ($validator->fails()) {
                return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
                ]);
            }

            try {

                $dataOrg = DatosOrganizaciones::prepararDatos($request);
                $datosOrgId = DatosOrganizaciones::insertarDatos($dataOrg,$request);

                $dataPostProy = PostulacionProyectos::prepararDatos($request);
                $insertedId = PostulacionProyectos::crearPostulacionFondos($dataPostProy,$datosOrgId);

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
                    ], 500);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear persona jurídica: ' . $e->getMessage()
                ], 500);
            }

        }

        if($id_val==4){
            $validator = PostulacionProyectos::validarEtapa4($request->all());
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

    public function verPerfilUsu()
    {
       $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

                $user=$user[0];

        return view('verPerfilUsu',['user' => $user]);
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
}
