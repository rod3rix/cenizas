<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class DatosOrganizaciones extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'nombre_organizacion',
        'domicilio_organizacion',
        'rut_organizacion',            
        'personalidad_juridica',
        'antiguedad_anos',
        'numero_socios',
        'certificado_pj',
        'razons_pyme',
        'rut_pyme',
        'domicilio_pyme',
        'certificado_sii',
        'archivo_rsh',
        'created_at',
        'updated_at'
    ];

    /**
     * Inserta los datos de una organización y devuelve el ID del nuevo registro.
     *
     * @param array $data
     * @return int
     */
    static function insertarDatos(array $data,$request)
    {
        if ($request->hasFile('certificado_pj')) {
            $nombreArchivoCert = 'certificado_pj_' . auth()->id() . "_" . date('Ymd_His') . "." . $request->file('certificado_pj')->getClientOriginalExtension();
            $archivo_certificado = $request->file('certificado_pj')->storeAs('public/archivos', $nombreArchivoCert);         
        }else{
            $nombreArchivoCert= null;
        }

        if ($request->hasFile('certificado_sii')) {
            $nombreArchivoSii = 'certificado_sii_' . auth()->id() . "_" . date('Ymd_His') . "." . $request->file('certificado_sii')->getClientOriginalExtension();
            $archivo_sii = $request->file('certificado_sii')->storeAs('public/archivos', $nombreArchivoSii);
        }else{
            $nombreArchivoSii= null;
        }

        if ($request->hasFile('archivo_rsh')) {
            $nombreArchivoRsh = 'archivo_rsh_' . auth()->id() . "_" . date('Ymd_His') . "." . $request->file('archivo_rsh')->getClientOriginalExtension();
            $archivo_rsh = $request->file('archivo_rsh')->storeAs('public/archivos', $nombreArchivoRsh);
        }else{
            $nombreArchivoRsh= null;
        }

        return DatosOrganizaciones::insertGetId([
            'user_id' => auth()->id(),
            'nombre_organizacion' => $data['nombre_organizacion'],
            'domicilio_organizacion' => $data['domicilio_organizacion'],
            'rut_organizacion' => $data['rut_organizacion'],
            'personalidad_juridica' => $data['personalidad_juridica'],
            'antiguedad_anos' => $data['antiguedad_anos'],
            'numero_socios' => $data['numero_socios'],
            'certificado_pj' => $nombreArchivoCert,
            'razons_pyme' => $data['razons_pyme'],
            'rut_pyme' => $data['rut_pyme'],
            'domicilio_pyme'  => $data['domicilio_pyme'],
            'certificado_sii' => $nombreArchivoSii,
            'archivo_rsh'  => $nombreArchivoRsh,
            'tipo'  => $data['organizationType'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    static function prepararDatos(Request $request)
    {
        return $request->only([
            'nombre_organizacion',
            'domicilio_organizacion',
            'rut_organizacion',
            'personalidad_juridica',
            'antiguedad_anos',
            'numero_socios',
            'razons_pyme',
            'rut_pyme',
            'domicilio_pyme',
            'certificado_sii',
            'archivo_rsh',
            'certificado_pj',
            'organizationType'
        ]);
    }

}