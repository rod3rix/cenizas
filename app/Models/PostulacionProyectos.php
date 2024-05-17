<?php
  
namespace App\Models;
  
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

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

}
            