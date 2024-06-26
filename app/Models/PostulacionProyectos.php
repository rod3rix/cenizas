<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Auth;

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
    'calificar',
    'respuesta',
    'archivo_respuesta',
     'created_at',
        'updated_at'
];


    public static function prepararDatos(Request $request)
    {
        return $request->only([
            'user_id',
            'persona_juridica_id',
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
            'created_at',
            'updated_at'
        ]);
    }

    public static function crearPostulacionFondos(array $data, $personaJurId)
    {
        $insertedId = self::insertGetId([
            'user_id' => auth()->id(),
            'persona_juridica_id' => $personaJurId,
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
            'nombre_organizacion' => $data['nombre_organizacion'],
            'rut_organizacion' => $data['rut_organizacion'],
            'domicilio_organizacion' => $data['domicilio_organizacion'],
            'personalidad_juridica' => $data['personalidad_juridica'],
            'antiguedad_anos' => $data['antiguedad_anos'],
            'numero_socios' => $data['numero_socios'],
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
            'pueblo_originario' => 'required|string|max:255',
            'discapacidad' => 'required|string|max:255',
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
            'tipo_proyecto' => 'required',
            'lugar_proyecto' => 'required|string|max:255',
            'directos' => 'required',
            'indirectos' => 'required',
            'aporte_solicitado' => 'required',
            'acepto_clausula_proy' => 'required',            
        ]);

        return $validator;
    }

}
            