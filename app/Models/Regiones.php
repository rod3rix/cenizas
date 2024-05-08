<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    protected $fillable = ['nombre'];

    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }
}
