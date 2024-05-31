<?php
  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Auth;

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
         'direccion',
         'formacion_formal',
         'profesion',
         'acepto_clausula',
         'id_dato_organizacion',
         'nombre_proyecto',
         'equipamiento',
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
         'id_persona_juridica',
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
         'direccion',
         'formacion_formal',
         'profesion',
         'acepto_clausula',
         'id_dato_organizacion',
         'nombre_proyecto',
         'equipamiento',
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
         'id_persona_juridica',
         'estado',
         'respuesta',
         'archivo_respuesta',
        'created_at',
        'updated_at'
        ]);
    }

    public static function crearPostulacionFondos(array $data, $datosOrgId, $personaJurId, $request,$fondoVigenteId)
    {
        // Manejo de archivos anexos
        $nombreArchivoAnexo = 'Fondo_anexo_' . auth()->id() . "_" . date('Ymd_His') . "." . $request->file('archivo_anexo')->getClientOriginalExtension();
        $archivo_anexo = $request->file('archivo_anexo')->storeAs('public/archivos', $nombreArchivoAnexo);

        $nombreArchivoCert = 'Fondo_certificado_' . auth()->id() . "_" . date('Ymd_His') . "." . $request->file('archivo_certificado')->getClientOriginalExtension();
        $archivo_certificado = $request->file('archivo_certificado')->storeAs('public/archivos', $nombreArchivoCert);

        // Insertar el registro y obtener el ID del nuevo registro insertado
        $insertedId = self::insertGetId([
            'user_id' => auth()->id(),
            'id_fondo_concursable' => $fondoVigenteId,
            'nacionalidad' => $data['nacionalidad'],
            'genero' => $data['genero'],
            'pueblo_originario' => $data['pueblo_originario'],
            'discapacidad' => $data['discapacidad'],
            'fecha_nacimiento' => date('Y-m-d', strtotime($data['fecha_nacimiento'])),
            'actividad_economica' => $data['actividad_economica'],
            'direccion' => $data['direccion'],
            'formacion_formal' => $data['formacion_formal'],
            'profesion' => $data['profesion'],
            'acepto_clausula' => $data['acepto_clausula'],
            'id_dato_organizacion' => $datosOrgId,
            'nombre_proyecto' => $data['nombre_proyecto'],
            'equipamiento' => $data['equipamiento'],
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
            'archivo_anexo' => $nombreArchivoAnexo,
            'archivo_certificado' => $nombreArchivoCert,
            'id_persona_juridica' => $personaJurId,
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $insertedId;
    }

    public static function validarEtapa1(array $data)
    {
         $validator = Validator::make( $data,[
            'nacionalidad' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'pueblo_originario' => 'required|string|max:255',
            'discapacidad' => 'required',
            'fecha_nacimiento' => 'required',
            'actividad_economica' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'formacion_formal' => 'required|string|max:255',  
            'profesion' => 'required|string|max:255', 
            'acepto_clausula' => 'required',
            ]);

        return $validator;
    }

    public static function validarEtapa2(array $data)
    {
        $validator = Validator::make($data, [
            'nombre_organizacion' => 'required|string|max:255',
            'rut_organizacion' => 'required',
            'domicilio_organizacion' => 'required|string|max:255',
            'personalidad_juridica' => 'required|string|max:255',
            'antiguedad_anos' => 'required',
            'numero_socios' => 'required',
        ]);

        return $validator;
    }

    public static function validarEtapa3(array $data)
    {
        $validator = Validator::make($data, [
            'nombre_proyecto' => 'required|string|max:255',
            'equipamiento' => 'required|string|max:255',
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
            'aporte_solicitado' => 'required',
            'aporte_terceros' => 'required',
            'aporte_propio' => 'required',
            'detalle.*' => 'required|string',
            'monto.*' => 'required|string',
            'archivo_anexo' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
            'archivo_certificado' => 'required|file|mimes:pdf,zip,rar|max:20480', // Máximo de 20 MB y permitir solo PDF, ZIP y RAR
            ]);

        return $validator;
    }

    public static function validarEtapa5(array $data)
    {
        $validator = Validator::make($data, [
            'id_dato_organizacion' => 'required'
        ]);

        return $validator;
    }

    public static function fondoVigenteId()
    {
      $currentDate = Carbon::now();
      $fondoVigente = ListadoFondos::where('vigencia', 1)
                                 ->where('fecha_termino', '>=', $currentDate)
                                 ->first();

      $fondoVigenteId = $fondoVigente ? $fondoVigente->id : null;

      return $fondoVigenteId;
    }

     public static function cerrarFondo($request)
    {
        $archivo = $request->file('archivo');
        $nombreArchivo = 'res_fondo_' . $request->pfondo_id . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('public/archivos', $nombreArchivo);

        $fondo = PostulacionFondos::findOrFail($request->pfondo_id);
        $fondo->calificar = $request->input('calificar');
        $fondo->respuesta = $request->input('respuesta');
        $fondo->archivo_respuesta = $nombreArchivo;
        $fondo->estado = $request->input('estado_fondo');
        $fondo->updated_at = Carbon::now();
        $fondo->save();

        return $fondo;
    }
}