<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListadoFondos extends Model
{
    use HasFactory;

    protected $table = 'listado_fondos';

    protected $fillable = ['nombre_fondo', 'descripcion',
    'fecha_inicio',
    'fecha_termino',
    'vigencia',
    'titulo_anual_id'];                
}
