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

    protected $fillable = [
    'nombre_fondo', 
    'descripcion',
    'zona',
    'fecha_inicio',
    'fecha_termino',
    'estado'];

     public static function crearFondo($request)
    {
       $insertedId = \DB::table('listado_fondos')->insertGetId([
                    'nombre_fondo' => $request->nombre_fondo,
                    'descripcion' => $request->descripcion,
                    'zona' => $request->zona,
                    'fecha_inicio' =>  $fecha_inicio_formatted = date('Y-m-d', strtotime($request->fecha_inicio)),
                    'fecha_termino' => $fecha_termino_formatted = date('Y-m-d', strtotime($request->fecha_termino)),
                    'estado' => $request->estado,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

        return $insertedId;
    }    

   public static function listarFondosAdmin()       
   {
      $zona = Auth::user()->zona;
      $postulacion = PostulacionFondos::join('users', 'postulacion_fondos.user_id', '=', 'users.id')
            ->where('users.zona',$zona)
            ->get(['postulacion_fondos.*', 'users.*','postulacion_fondos.id']);

      $postulacion = $postulacion->transform(function ($postulacion) {
            switch ($postulacion->estado) {
                case 1:
                    $postulacion->calificacion = '<a href="' . route("detalleFondoAdmin", ["id" => $postulacion->id]) . '">Calificar</a>';
                    $postulacion->estado = 'Enviado';
                    $postulacion->respuesta = '<a href="' . route("detalleFondoAdmin", ["id" => $postulacion->id]) . '">Responder</a>';
                    break;
                case 2:
                    $postulacion->calificacion = '<a href="' . route("respuestaFondoAdmin", ["id" => $postulacion->id]) . '#calificacion">Ver Calificación</a>';
                    $postulacion->estado = 'En proceso';
                    $postulacion->respuesta = '<a href="' . route("respuestaFondoAdmin", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
                case 3:
                    $postulacion->calificacion = '<a href="' . route("respuestaFondoAdmin", ["id" => $postulacion->id]) . '#calificacion">Ver Calificación</a>';
                    $postulacion->estado = 'En proceso';
                    $postulacion->respuesta = '<a href="' . route("respuestaFondoAdmin", ["id" => $postulacion->id]) . '">Ver Respuesta</a>';
                    break;
            } 

            $postulacion->created_at_formatted = Carbon::parse($postulacion->created_at)->format('d-m-Y');
            
            return $postulacion;
      });

      return $postulacion;

    }

    public static function fondoVigente()       
   {
        $currentDate = Carbon::now()->endOfDay()->format('Y-m-d');
        $isVigente = ListadoFondos::where('estado', 1)
            ->whereDate('fecha_termino', '>=', $currentDate)
            ->exists();

        return $isVigente;
   } 
}
