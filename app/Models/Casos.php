<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Auth;

class Casos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idUser',
        'tipo',
        'localidad',
        'region_id',
        'comuna_id',
        'direccion',
        'asunto',
        'descripcion',
        'archivo',
        'estado',
        'respuesta',
        'archivo_respuesta',
        'created_at',
        'updated_at'
    ];

     public static function validar(array $data)
    {
         $validator = Validator::make( $data,[
            'tipo' => 'required|string|max:255',
            'localidad' => 'required',
            'region' => 'required',
            'comuna' => 'required',
            'direccion' => 'required|string|max:255',
            'asunto' => 'required|string|max:255',  
            'descripcion' => 'required|string|max:2500', 
            'archivo' => 'required|file|mimes:pdf,zip,rar|max:20480',
            ]);

        return $validator;
    }

     public static function crearCaso($request)
    {
        $archivo = $request->file('archivo');
        $nombreArchivo = 'caso_' . auth()->id() . "_" . date('Ymd_His') . "." . $archivo->getClientOriginalExtension();
        $archivo->storeAs('public/archivos', $nombreArchivo);

        $insertedId = \DB::table('casos')->insertGetId([
            'idUser' => auth()->id(),
            'tipo' => $request->tipo,
            'localidad' => $request->localidad,
            'region_id' => $request->region,
            'comuna_id' => $request->comuna,
            'direccion' => $request->direccion,
            'asunto' => $request->asunto,
            'descripcion' => $request->descripcion,
            'archivo' => $nombreArchivo,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $insertedId;
    }
}
