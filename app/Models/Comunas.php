<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comunas extends Model
{
    protected $fillable = ['nombre', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
