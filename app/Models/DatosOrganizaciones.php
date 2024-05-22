<?php
  
namespace App\Models;
  
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

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
}