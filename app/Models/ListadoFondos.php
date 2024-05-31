<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class ListadoFondos extends Model
{
    // use HasFactory;

    protected $table = 'listado_fondos';

    protected $fillable = ['nombre_fondo', 'descripcion',
    'fecha_inicio',
    'fecha_termino',
    'vigencia',
    'titulo_anual_id'];

     public static function crearFondo($request)
    {
       $insertedId = \DB::table('listado_fondos')->insertGetId([
                    'nombre_fondo' => $request->nombre_fondo,
                    'descripcion' => $request->descripcion,
                    'fecha_inicio' =>  $fecha_inicio_formatted = date('Y-m-d', strtotime($request->fecha_inicio)),
                    'fecha_termino' => $fecha_termino_formatted = date('Y-m-d', strtotime($request->fecha_termino)),
                    'vigencia' => 1,
                    'titulo_anual_id'  => $request->titulo_anual_id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                DB::table('listado_fondos')
                ->where('id', '!=', $insertedId)
                ->update(['vigencia' => 0]);

        return $insertedId;
    }            
}
