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

class PersonaJuridicas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'rut',
        'razon_social',
        'relacion',
        'estado',
        'created_at',
        'updated_at'
    ];
    
      /**
     * Inserta los datos y devuelve el ID del nuevo registro.
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
}