<?php
  
namespace App\Models;
  
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

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
}