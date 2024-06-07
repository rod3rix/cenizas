<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'rut',
        'fono',
        'email',
        'zona',
        'rol',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  $value == 2 ? "admin" : "user",
        );
    }

    public static function acceso($var)
    {
        $acceso=true;

        if(Auth::user()->zona!=$var->zona){
            $acceso=false;
        }

        return $acceso;
    }

    public static function detalleUser($id)
    {
        $user = DB::table('users')
            ->leftJoin('puntaje_users', 'users.id', '=', 'puntaje_users.user_id')
            ->select('users.*', 'puntaje_users.influencia', 'puntaje_users.vecindad', 'puntaje_users.vecindad_mlc', 'puntaje_users.poder')
            ->where('users.id', $id)
            ->first();

        return $user;
    }

}