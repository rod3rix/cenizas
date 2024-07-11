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
use App\Mail\FondosMail;

class PostulacionFondos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'user_id',
         'id_fondo_concursable',
         'nacionalidad',
         'genero',
         'pueblo_originario',
         'discapacidad',
         'fecha_nacimiento',
         'actividad_economica',
         'otros',
         'direccion',
         'formacion_formal',
         'profesion',
         'acepto_clausula',
         'id_dato_organizacion',
         'nombre_proyecto',
         'tipo_proyecto',
         'fundamentacion',
         'descripcion_proyecto',
         'objetivo_general',
         'objetivos_especificos',
         'cierre_proyecto',
         'directos',
         'indirectos',
         'fecha_inicio',
         'fecha_termino',
         'cantidad_dias',
         'aporte_solicitado',
         'aporte_terceros',
         'aporte_propio',
         'archivo_anexo',
         'archivo_certificado',
         // 'id_persona_juridica',
         'estado',
         'respuesta',
         'archivo_respuesta',
        'created_at',
        'updated_at'
    ];

     
    public static function prepararDatos(Request $request)
    {
        return $request->only([
         'user_id',
         'id_fondo_concursable',
         'nacionalidad',
         'genero',
         'pueblo_originario',
         'discapacidad',
         'fecha_nacimiento',
         'actividad_economica',
         'otra_especificar',
         'direccion',
         'formacion_formal',
         'profesion',
         'acepto_clausula',
         'id_dato_organizacion',
         'nombre_proyecto',
         'tipo_proyecto',
         'fundamentacion',
         'descripcion_proyecto',
         'objetivo_general',
         'objetivos_especificos',
         'cierre_proyecto',
         'directos',
         'indirectos',
         'fecha_inicio',
         'fecha_termino',
         'cantidad_dias',
         'aporte_solicitado',
         'aporte_terceros',
         'aporte_propio',
         'archivo_anexo',
         'archivo_certificado',
         // 'id_persona_juridica',
         'estado',
         'calificar',
         'respuesta',
         'archivo_respuesta',
        'created_at',
        'updated_at'
        ]);
    }

    public static function crearPostulacionFondos(array $data, $datosOrgId, $request)
    {
        // Manejo de archivos anexos
        $nombreArchivoAnexo = 'Fondo_anexo_' . auth()->id() . "_" . date('Ymd_His') . "." . $request->file('archivo_anexo')->getClientOriginalExtension();
        $archivo_anexo = $request->file('archivo_anexo')->storeAs('public/archivos', $nombreArchivoAnexo);

        // $nombreArchivoCert = 'Fondo_certificado_' . auth()->id() . "_" . date('Ymd_His') . "." . $request->file('archivo_certificado')->getClientOriginalExtension();
        // $archivo_certificado = $request->file('archivo_certificado')->storeAs('public/archivos', $nombreArchivoCert);

        // Insertar el registro y obtener el ID del nuevo registro insertado
        $insertedId = self::insertGetId([
            'user_id' => auth()->id(),
            'id_fondo_concursable' => $data['id_fondo_concursable'],
            'nacionalidad' => $data['nacionalidad'],
            'genero' => $data['genero'],
            'pueblo_originario' => $data['pueblo_originario'],
            'discapacidad' => $data['discapacidad'],
            'fecha_nacimiento' => date('Y-m-d', strtotime($data['fecha_nacimiento'])),
            'actividad_economica' => $data['actividad_economica'],
            'otros' => $data['otra_especificar'],
            'direccion' => $data['direccion'],
            'formacion_formal' => $data['formacion_formal'],
            'profesion' => $data['profesion'],
            'acepto_clausula' => $data['acepto_clausula'],
            'id_dato_organizacion' => $datosOrgId,
            'nombre_proyecto' => $data['nombre_proyecto'],
            'tipo_proyecto' => $data['tipo_proyecto'],
            'fundamentacion' => $data['fundamentacion'],
            'descripcion_proyecto' => $data['descripcion_proyecto'],
            'objetivo_general' => $data['objetivo_general'],
            'objetivos_especificos' => $data['objetivos_especificos'],
            'cierre_proyecto' => $data['cierre_proyecto'],
            'directos' => $data['directos'],
            'indirectos' => $data['indirectos'],
            'fecha_inicio' => date('Y-m-d', strtotime($data['fecha_inicio'])),
            'fecha_termino' => date('Y-m-d', strtotime($data['fecha_termino'])),
            'cantidad_dias' => $data['cantidad_dias'],
            'aporte_solicitado' => $data['aporte_solicitado'],
            'aporte_terceros' => $data['aporte_terceros'],
            'aporte_propio' => $data['aporte_propio'],
            // 'archivo_anexo' => $nombreArchivoAnexo,
            // 'archivo_certificado' => $nombreArchivoCert,
            // 'id_persona_juridica' => 33,
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $insertedId;
    }

    public static function validarEtapa1(array $data)
    {
        $validator = Validator::make( $data,[
            'id_fondo_concursable' => 'required',
            'nacionalidad' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'pueblo_originario' => 'required|string|max:255',
            'discapacidad' => 'required',
            'fecha_nacimiento' => 'required',
            'actividad_economica' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'formacion_formal' => 'required',
            'profesion' => 'required|string|max:255', 
            'acepto_clausula' => 'required',
        ],[
            'id_fondo_concursable.required' => 'El campo fondos disponibles es obligatorio.',
        ]);

        
        $validator->sometimes('otra_especificar', 'required|string|max:255', function ($input) {
            return $input->actividad_economica === 'Otra';
        });

        return $validator;
    }

    public static function validarEtapa2(array $data)
    {
        $validator = Validator::make($data, [
            'nombre_organizacion' => 'required|string|max:255',
            'rut_organizacion' => ['required', new RutValidation],
            'domicilio_organizacion' => 'required|string|max:255',
            'antiguedad_anos' => 'required',
            'numero_socios' => 'required',
            'certificado_pj' => 'required|file|mimes:pdf,zip,rar|max:20480',
        ]);

        return $validator;
    }

    public static function validarEtapa4(array $data)
    {
        $validator = Validator::make($data, [
            'nombre_proyecto' => 'required|string|max:255',
            'tipo_proyecto' => 'required|string|max:255',
            'fundamentacion' => 'required|string|max:255',
            'descripcion_proyecto' => 'required|string|max:255',
            'objetivo_general' => 'required|string|max:255',
            'objetivos_especificos' => 'required|string|max:255',
            'cierre_proyecto' => 'required|string|max:255',
            'directos' => 'required',
            'indirectos' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'cantidad_dias' => 'required',
            'rec_humanos' => 'required',
            'mat_insumos' => 'required',
            'aporte_solicitado' => 'required',
            'aporte_terceros' => 'required',
            'aporte_propio' => 'required',
            // 'detalle.*' => 'required|string',
            // 'monto.*' => 'required|string',
            'archivo_anexo' => 'required|file|mimes:pdf,zip,rar|max:20480',
            ]);

        $validator->sometimes('otra_especificar', 'required|string|max:255', function ($input) {
            return $input->actividad_economica === 'Otra';
        });

        return $validator;
    }

     public static function validarEtapa5(array $data)
    {
        $validator = Validator::make($data, [
            'nombre_proyecto' => 'required|string|max:255',
            'tipo_proyecto' => 'required|string|max:255',
            'fundamentacion' => 'required|string|max:1500',
            'descripcion_proyecto' => 'required|string|max:1500',
            'objetivo_general' => 'required|string|max:1500',
            'objetivos_especificos' => 'required|string|max:1500',
            'cierre_proyecto' => 'required|string|max:255',
            'directos' => 'required',
            'indirectos' => 'required',
            'fecha_inicio' => 'required',
            'fecha_termino' => 'required',
            'cantidad_dias' => 'required',
            // 'rec_humanos' => 'required',
            // 'mat_insumos' => 'required',
            // 'otros' => 'required',
            'aporte_solicitado' => 'required',
            'aporte_terceros' => 'required',
            'aporte_propio' => 'required',
            'detalle.*' => 'required|string',
            'monto.*' => 'required|string',
            'archivo_anexo' => 'required|file|mimes:pdf,zip,rar|max:20480',
            ]);

        return $validator;
    }

    public static function validarEtapa3(array $data)
    {
        $validator = Validator::make( $data,[
            'razons_pyme' => 'required|string|max:255',
            'rut_pyme' => ['required', new RutValidation],
            'domicilio_pyme' => 'required|string|max:255',
            'certificado_sii' => 'required|file|mimes:pdf,zip,rar|max:20480',
            'archivo_rsh' => 'required|file|mimes:pdf,zip,rar|max:20480',
            ], [
            'razons_pyme.required' => 'El campo razón social MIPYME es obligatorio.',
            'certificado_sii.required' => 'El campo Adjuntar certificado iniciación actividades (SII) es obligatorio.',
            'archivo_rsh.required' => 'El campo  Adjuntar ficha de registro social de hogares del representante legal de MIPYME es obligatorio.'
        ]);

        return $validator;
    }

    public static function fondoVigenteId()
    {
      $currentDate = Carbon::now();
      $fondoVigente = ListadoFondos::where('estado', 1)
                                 ->where('fecha_termino', '>=', $currentDate)
                                 ->first();

      $fondoVigenteId = $fondoVigente ? $fondoVigente->id : null;

      return $fondoVigenteId;
    }

     public static function cerrarFondo($request)
    {
        
        if ($request->hasFile('archivo')) {
        $archivo = $request->file('archivo');
        $nombreArchivo = 'res_fondo_' . $request->pfondo_id . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('public/archivos', $nombreArchivo);
        }else{
            $nombreArchivo= null;
        }

        $fondo = PostulacionFondos::findOrFail($request->pfondo_id);
        $fondo->calificar = $request->input('calificar');
        $fondo->respuesta = $request->input('respuesta');
        $fondo->archivo_respuesta = $nombreArchivo;
        $fondo->estado = $request->input('estado_fondo');
        $fondo->updated_at = Carbon::now();
        $fondo->save();

        return $fondo;
    }

    public static function getPostFondos($id)
    {
        $postulaciones = DB::table('listado_fondos')
            ->join('postulacion_fondos', 'listado_fondos.id', '=', 'postulacion_fondos.id_fondo_concursable')
            ->where('postulacion_fondos.user_id', $id)
            ->select(
                'postulacion_fondos.id AS id_postulacion',
                'listado_fondos.nombre_fondo',
                'postulacion_fondos.created_at',
                'postulacion_fondos.estado AS estado_num',
                DB::raw("CASE 
                            WHEN postulacion_fondos.estado = 1 THEN 'Enviado'
                            WHEN postulacion_fondos.estado = 2 THEN 'Aprobado'
                            WHEN postulacion_fondos.estado = 3 THEN 'Rechazado'
                         END AS estado")
            )
            ->get();

        // Formatear la fecha
        foreach ($postulaciones as $postulacion) {
            $postulacion->created_at = Carbon::parse($postulacion->created_at)->format('d/m/Y');
        }

        // Transformar los resultados
        $postulaciones = $postulaciones->map(function ($postulacion) {
            switch ($postulacion->estado_num) {
                case 1:
                    $postulacion->estado_texto = 'Enviado';
                    $postulacion->resolucion = 'En proceso';
                    break;
                case 2:
                    $postulacion->estado_texto = 'Aceptado';
                    $postulacion->resolucion = '<a href="' . route("respuestaFondo", ["id" => $postulacion->id_postulacion]) . '">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->estado_texto = 'Rechazado';
                    $postulacion->resolucion = '<a href="' . route("respuestaFondo", ["id" => $postulacion->id_postulacion]) . '">Ver Respuesta</a>';
                    break;
            }
            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');

            return $postulacion;
        });

        return $postulaciones;
    }

    public static function respuestaFondoAdmin($id)
    {
        $pfondo = DB::table('postulacion_fondos')
            ->join('listado_fondos', 'listado_fondos.id', '=', 'postulacion_fondos.id_fondo_concursable')
            ->join('users', 'users.id', '=', 'postulacion_fondos.user_id')
            ->join('datos_organizaciones', 'datos_organizaciones.id', '=', 'postulacion_fondos.id_dato_organizacion')
            ->select('listado_fondos.*','users.*', 'postulacion_fondos.*', 'datos_organizaciones.*', 'datos_organizaciones.domicilio_organizacion', 'postulacion_fondos.id as post_fondo_id')
            ->where('postulacion_fondos.id', $id)
            ->first();

        return $pfondo;
    }

    public static function detalleFondoAdmin($id)
    {
        $pfondo = DB::table('postulacion_fondos')
            ->join('users', 'users.id', '=', 'postulacion_fondos.user_id')
            ->join('datos_organizaciones', 'datos_organizaciones.id', '=', 'postulacion_fondos.id_dato_organizacion')
            ->select('users.*', 'postulacion_fondos.*', 'datos_organizaciones.*','datos_organizaciones.domicilio_organizacion','postulacion_fondos.id as post_fondo_id')
            ->where('postulacion_fondos.id', $id)
            ->first();

        return $pfondo;
    }

    public static function listarFondos()
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
                    $postulacion->resolucion = '<a href="' . route("respuestaFondo", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->estado_texto = 'Rechazado';
                    $postulacion->resolucion = '<a href="' . route("respuestaFondo", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
            }
            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');

            return $postulacion;
        });

        return $postulacion;

    }

    public static function fondosEmail($fondo_id)
    {
        try {
        $email = PostulacionFondos::where('postulacion_fondos.id', '=', $fondo_id)
            ->join('users', 'postulacion_fondos.user_id', '=', 'users.id')
            ->select('users.email as email')
            ->first();

        if (!$email) {
            throw new Exception('No se encontró el correo electrónico para el proyecto ID: ' . $proy_id);
        }

        Mail::to($email->email)->send(new FondosMail());

        return true;
        } catch (Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            return false;
        }
    }

}