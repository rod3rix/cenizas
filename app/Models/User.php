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

    public static function verPerfil()
    {
        $user = DB::table('users')
                ->where('id', '=', auth()->id())
                ->get();

        $user=$user[0];
    
        return $user;
    }

    public static function getData()
    {
        $zona = auth()->user()->zona;

        $data = DB::table('users')
            ->leftJoin('puntaje_users', 'users.id', '=', 'puntaje_users.user_id')
            ->select(
        'users.*',
        DB::raw('COALESCE(puntaje_users.influencia, 0) as influencia'),
        DB::raw('COALESCE(puntaje_users.vecindad, 0) as vecindad'),
        DB::raw('COALESCE(puntaje_users.vecindad_mlc, 0) as vecindad_mlc'),
        DB::raw('COALESCE(puntaje_users.poder, 0) as poder')
        )
        ->where('users.zona', $zona)
        ->where('users.rol', 0)
        ->where('users.type', 1)
        ->get();

        $data->transform(function ($user) {
            $user->rut = $this->formatRut($user->rut);
            $user->user_id_link = '<a href="' . route("detalleUser", ["id" => $user->id]) . '">' . $user->id . '</a>';
            return $user;
        });
    
        return $data;
    }

    public static function registrarUsuAdmin()
    {
        $user = new user;
        $user->name =  $request->name;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->rut = $request->rut;
        $user->email = $request->email;
        $user->fono = $request->telefono;
        $user->zona = $request->zona;
        $user->type = 2;
        $user->password = bcrypt($request->password);
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();

        return $user;
    }

    public static function listarUsuariosAdmin()
    {
        $users = User::where('type', 2)
            ->select('users.*')
            ->get();

        $users = $users->transform(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'apellido_paterno' => $user->apellido_paterno,
            'rut' => $user->rut,
            'link_editar' => '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-id="'.$user->id.'">Ver Detalles</button>'
            ];
        });

        return $users;
    }    

    public static function updateUser($id,$request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->modalUserName;
        $user->apellido_paterno = $request->modalUserApellidoPaterno;
        $user->apellido_materno = $request->modalUserApellidoMaterno;
        $user->rut = $request->modalUserRut;
        $user->email = $request->modalUserEmail;
        $user->fono = $request->modalUserTelefono;
        $user->zona = $request->modalUserZona;

        if ($request->modalUserPassword) {
            $user->password = Hash::make($request->modalUserPassword);
        }

        $user->save();
        return $user;
    }
}