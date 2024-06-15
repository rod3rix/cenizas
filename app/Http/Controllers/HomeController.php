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
        $currentDate = Carbon::now()->endOfDay()->format('Y-m-d');
        $isVigente = ListadoFondos::where('vigencia', 1)
            ->whereDate('fecha_termino', '>=', $currentDate)
            ->exists();
        $user = DB::table('users')
            ->where('id', '=', auth()->id())
            ->first();

        return view('postularFondos', ['user' => $user, 'isVigente' => $isVigente]);
    }

    public function postularProyectos()
    {
        $user = DB::table('users')
            ->where('id', '=', auth()->id())
            ->first();

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
        $user = DB::table('users')
            ->where('id', '=', auth()->id())
            ->first();

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
        $casos = Casos::where('idUser', '=', auth()->id())
            ->join('users', 'casos.idUser', '=', 'users.id')
            ->select('casos.*', 'users.name as nombre_usuario', 'casos.id as caso_id')
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
                    $postulacion->resolucion = '<a href="' . route("respuestaProyecto", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->estado_texto = 'Rechazado';
                    $postulacion->resolucion = '<a href="' . route("respuestaProyecto", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
            }
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
            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');

            return $postulacion;
        });

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
        $personaJuridica = DB::table('persona_juridicas')
            ->where('id', '=', $id)
            ->first();

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
}
