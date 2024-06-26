<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Rules\RutValidation;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProyectosMail;

class PostulacionProyectos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
protected $fillable = [
    'user_id',
    'nacionalidad',
    'genero',
    'pueblo_originario',
    'discapacidad',
    'fecha_nacimiento',
    'actividad_economica',
    'direccion',
    'formacion_formal',  
    'profesion', 
    'acepto_clausula',
    'nombre_organizacion',
    'rut_organizacion',
    'domicilio_organizacion',
    'personalidad_juridica',
    'antiguedad_anos',
    'numero_socios',
    'nombre_proyecto',
    'tipo_proyecto',
    'lugar_proyecto',
    'directos',
    'indirectos',
    'aporte_solicitado',
    'acepto_clausula_proy',
    'estado',
    // 'calificar',
    'respuesta',
    'archivo_respuesta',
    'created_at',
    'updated_at'
];


    public static function prepararDatos(Request $request)
    {
        return $request->only([
            'user_id',
            'organizacion_id',
            'nacionalidad',
            'genero',
            'pueblo_originario',
            'discapacidad',
            'fecha_nacimiento',
            'actividad_economica',
            'direccion',
            'formacion_formal',
            'profesion', 
            'acepto_clausula',
            'nombre_proyecto',
            'tipo_proyecto',
            'lugar_proyecto',
            'directos',
            'indirectos',
            'aporte_solicitado',
            'acepto_clausula_proy',
            'estado',
            'created_at',
            'updated_at'
        ]);
    }

    public static function crearPostulacionFondos(array $data, $datosOrgId)
    {
        $insertedId = self::insertGetId([
            'user_id' => auth()->id(),
            'organizacion_id' => $datosOrgId,
            'nacionalidad' => $data['nacionalidad'],
            'genero' => $data['genero'],
            'pueblo_originario' => $data['pueblo_originario'],
            'discapacidad' => $data['discapacidad'],
            'fecha_nacimiento' =>  date('Y-m-d', strtotime($data['fecha_nacimiento'])),
            'actividad_economica' => $data['actividad_economica'],
            'direccion' => $data['direccion'],
            'formacion_formal' => $data['formacion_formal'],  
            'profesion' => $data['profesion'],
            'acepto_clausula' => $data['acepto_clausula'],
            'nombre_proyecto' => $data['nombre_proyecto'],
            'tipo_proyecto' => $data['tipo_proyecto'],
            'lugar_proyecto' => $data['lugar_proyecto'],
            'directos' => $data['directos'],
            'indirectos' => $data['indirectos'],
            'aporte_solicitado' => $data['aporte_solicitado'],
            'acepto_clausula_proy' => $data['acepto_clausula_proy'],
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $insertedId;
    }

    public static function validarEtapa1(array $data)
    {
        $validator = Validator::make($data, [
            'nacionalidad' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'pueblo_originario' =>  'required', 
            'discapacidad' => 'required|boolean',
            'fecha_nacimiento' => 'required',
            'actividad_economica' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'formacion_formal' => 'required|string|max:255',  
            'profesion' => 'required|string|max:255', 
            'acepto_clausula' => 'required',
        ]);

        return $validator;
    }

    public static function validarEtapa3(array $data)
    {
        $validator = Validator::make($data, [
            'nombre_proyecto' => 'required|string|max:255',
            'tipo_proyecto' => 'required',
            'lugar_proyecto' => 'required|string|max:255',
            'directos' => 'required',
            'indirectos' => 'required',
            'aporte_solicitado' => 'required',
            'acepto_clausula_proy' => 'required',            
        ]);

        return $validator;
    }

    public static function validarEtapa4(array $data)
    {
         $validator = Validator::make( $data,[
            'razons_pyme' => 'required|string|max:255',
            'rut_pyme' => ['required', new RutValidation],
            'domicilio_pyme' => 'required|string|max:255',
            'certificado_sii' => 'required|file|mimes:pdf,zip,rar|max:20480',
            'archivo_rsh' => 'required|file|mimes:pdf,zip,rar|max:20480',
            ]);

        return $validator;
    }

    public static function cerrarPostulacion($request)
    {
        $archivo = $request->file('archivo');
        $nombreArchivo = 'res_proy_' . $request->pproy_id . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('public/archivos', $nombreArchivo);
        
        $post = PostulacionProyectos::findOrFail($request->pproy_id);
        $post->respuesta = $request->input('respuesta');
        $post->archivo_respuesta = $nombreArchivo;
        $post->estado = $request->input('estado_proyecto');
        $post->updated_at = Carbon::now();
        $post->save();

        return $post;
    }

    public static function getPostProy($id)
    {
        $postulaciones = DB::table('postulacion_proyectos')
            ->where('postulacion_proyectos.user_id', $id)
            ->select(
            'postulacion_proyectos.id AS id_postulacion', 
            'postulacion_proyectos.nombre_proyecto', 
            'postulacion_proyectos.created_at', 
            DB::raw("CASE 
                        WHEN estado = 1 THEN 'Enviado'
                        WHEN estado = 2 THEN 'Aprobado'
                        WHEN estado = 3 THEN 'Rechazado'
                     END AS estado"),
            'created_at'
        )
        ->get();

        foreach ($postulaciones as $postulacion) {
            $postulacion->created_at = Carbon::parse($postulacion->created_at)->format('d/m/Y');
        }

        return $postulaciones;
    }

    public static function listarApoyoProyectosAdmin()
    {
        $zona = Auth::user()->zona;

        $postulacion = PostulacionProyectos::join('users', 'postulacion_proyectos.user_id', '=', 'users.id')
        ->where('users.zona',$zona)
        ->get(['postulacion_proyectos.*', 'users.*','postulacion_proyectos.id']);

        $postulacion = $postulacion->transform(function ($postulacion) {
            switch ($postulacion->estado) {
                case 1:
                    $postulacion->calificacion = '<a href="' . route("detalleProyectoAdmin", ["id" => $postulacion->id]) . '">Responder</a>';
                    $postulacion->estado = 'En proceso';
                    $postulacion->respuesta = '<a href="' . route("detalleProyectoAdmin", ["id" => $postulacion->id]) . '">Responder</a>';
                    break;
                case 2:
                    $postulacion->calificacion = '<a href="' . route("respuestaProyectoAdmin", ["id" => $postulacion->id]) . '#calificacion">Ver Calificación</a>';
                    $postulacion->estado = 'Enviado';
                    $postulacion->respuesta = '<a href="' . route("respuestaProyectoAdmin", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->calificacion = '<a href="' . route("respuestaProyectoAdmin", ["id" => $postulacion->id]) . '#calificacion">Ver Calificación</a>';
                    $postulacion->estado = 'Enviado';
                    $postulacion->respuesta = '<a href="' . route("respuestaProyectoAdmin", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
            } 

            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');
            
            return $postulacion;
        });

        return $postulacion;
    }

    public static function detalleProyectoAdmin($id)
    {
        $pproy = DB::table('postulacion_proyectos')
            ->join('users as users1', 'users1.id', '=', 'postulacion_proyectos.user_id')
            ->join('datos_organizaciones', 'datos_organizaciones.user_id', '=', 'users1.id')
            ->join('users as users2', 'users2.id', '=', 'datos_organizaciones.user_id')
            ->select('users1.*', 'postulacion_proyectos.*', 'postulacion_proyectos.id as id_proy','datos_organizaciones.*')
            ->where('postulacion_proyectos.id', $id)
            ->first();

        return $pproy;
    }

    public static function respuestaProyectoAdmin($id)
    {
        $pproy = DB::table('postulacion_proyectos')
            ->join('users as users1', 'users1.id', '=', 'postulacion_proyectos.user_id')
            ->join('datos_organizaciones', 'datos_organizaciones.user_id', '=', 'users1.id')
            ->join('users as users2', 'users2.id', '=', 'datos_organizaciones.user_id')
            ->select('users1.*', 'postulacion_proyectos.*', 'postulacion_proyectos.id as id_proy','datos_organizaciones.*')
            ->where('postulacion_proyectos.id', $id)
            ->first();

        return $pproy;
    }

    public static function validarEtapa2(array $data)
    {
        $validator = Validator::make($data, [
            'nombre_organizacion' => 'required|string|max:255',
            'rut_organizacion' => ['required', new RutValidation],
            'domicilio_organizacion' => 'required|string|max:255',
            'personalidad_juridica' => 'required|string|max:255',
            'antiguedad_anos' => 'required',
            'numero_socios' => 'required',
            'certificado_pj' => 'required|file|mimes:pdf,zip,rar|max:20480',
        ]);

        return $validator;
    }

    public static function listarApoyoProyectos()
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

        return $postulacion;
    }

    public static function proyectosEmail($proy_id)
    {
        try {
        $email = PostulacionProyectos::where('postulacion_proyectos.id', '=', $proy_id)
            ->join('users', 'postulacion_proyectos.user_id', '=', 'users.id')
            ->select('users.email as email')
            ->first();

        if (!$email) {
            throw new Exception('No se encontró el correo electrónico para el proyecto ID: ' . $proy_id);
        }

        Mail::to($email->email)->send(new ProyectosMail());

        return true;
        } catch (Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return false;
        }
    }
}
            