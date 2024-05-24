<?php
  
namespace App\Models;
  
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Auth;

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
        'created_at',
        'updated_at'
    ];

    /**
     * Inserta los datos de una organización y devuelve el ID del nuevo registro.
     *
     * @param array $data
     * @return int
     */
    static function insertarDatos(array $data)
    {
        return DatosOrganizaciones::insertGetId([
            'user_id' => auth()->id(),
            'nombre_organizacion' => $data['nombre_organizacion'],
            'domicilio_organizacion' => $data['domicilio_organizacion'],
            'rut_organizacion' => $data['rut_organizacion'],
            'personalidad_juridica' => $data['personalidad_juridica'],
            'antiguedad_anos' => $data['antiguedad_anos'],
            'numero_socios' => $data['numero_socios'],
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
            'numero_socios'
        ]);
    }

     static function validarCampos(array $data)
    {
        $validator = Validator::make($data, [
            'rut_juridico' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
            'relacion' => 'required|string|max:255',
            'estado' => 'required|string|max:255'
        ], [
            'rut_juridico.required' => 'El RUT jurídico es obligatorio.',
            'razon_social.required' => 'La razón social es obligatoria.',
            'relacion.required' => 'La relación es obligatoria.',
            'estado.required' => 'El estado es obligatorio.'
        ]);

        return $validator;
    }
}