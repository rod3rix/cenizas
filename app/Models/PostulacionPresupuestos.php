<?php
  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Auth;

class PostulacionPresupuestos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'postulacion_fondos_id',
        'detalle',
        'monto',
        'created_at',
        'updated_at'
    ];
     
    public static function prepararDatos(Request $request)
    {
        return $request->only([
        'postulacion_fondos_id',
        'detalle',
        'monto',
        'created_at',
        'updated_at'
        ]);
    }

    public static function crearPresupuestos(array $data, $postulacion_fondos_id)
    { 
         \Log::info('PostulacionFondos: crearPresupuestos');

        $presupuestos = [];
        $numPresupuestos = count($data["detalle"]);

        for ($i = 0; $i < $numPresupuestos; $i++) {
            $detalle = $data["detalle"][$i];
            $monto = $data["monto"][$i];

            $presupuestos[] = [
                'postulacion_fondos_id' => $postulacion_fondos_id,
                'detalle' => $detalle,
                'monto' => $monto,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

    self::insert($presupuestos);
    }
}