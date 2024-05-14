<?php
  
namespace App\Models;
  
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class PuntajeUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'influencia',
        'vecindad',
        'vecindad_mlc',
        'poder',
        'created_at',
        'updated_at'
    ];
}