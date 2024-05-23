<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TituloFondos extends Model
{
    use HasFactory;

    protected $table = 'titulo_fondos';

    protected $fillable = ['nombre'];
}
