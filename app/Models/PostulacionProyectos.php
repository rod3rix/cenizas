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
            'estado',
            'created_at',
            'updated_at'
    ];
}
            