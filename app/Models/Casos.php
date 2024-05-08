<?php
  
namespace App\Models;
  
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'region',
        'comuna',
        'direccion',
        'asunto',
        'descripcion',
        'archivo',
        'created_at',
        'updated_at'
    ];
}
