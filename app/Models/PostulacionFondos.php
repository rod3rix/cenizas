<?php
  
namespace App\Models;
  
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class PostulacionFondos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
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
}