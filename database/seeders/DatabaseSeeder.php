<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Rod Admin',
               'type'=>2, // 1 = User, 2 = Admin, 3 = SuperAdmin
               'password'=> bcrypt('123456'),
               'apellido_paterno'=>'Paterno',
               'apellido_materno'=>'Marterno',
               'rut' =>'11.111.111.1',
               'fono'=>'963548898',
               'email'=>'rod@zimple.pro',
               'zona'=>'0',
            ],
            [
               'name'=>'Admin Taltal',
               'type'=>2, // 1 = User, 2 = Admin, 3 = SuperAdmin
               'password'=> bcrypt('123456'),
               'apellido_paterno'=>'Paterno',
               'apellido_materno'=>'Marterno',
               'rut' =>'11.111.111.1',
               'fono'=>'963548898',
               'email'=>'adminzonat@cenizas.cl',
               'zona'=>'1',
            ],
            [
               'name'=>'Admin Cabilo',
               'type'=>2, // 1 = User, 2 = Admin, 3 = SuperAdmin
               'password'=> bcrypt('123456'),
               'apellido_paterno'=>'Paterno',
               'apellido_materno'=>'Marterno',
               'rut' =>'22.222.222-2',
               'fono'=>'963548898',
               'email'=>'adminzonac@cenizas.cl',
               'zona'=>'2',
            ],
            [
               'name'=>'User Taltal',
               'type'=>1, // 1 = User, 2 = Admin, 3 = SuperAdmin
               'password'=> bcrypt('123456'),
               'apellido_paterno'=>'Paterno',
               'apellido_materno'=>'Marterno',
               'rut' =>'22.222.222-2',
               'fono'=>'963548898',
               'email'=>'usert@cenizas.cl',
               'zona'=>'1',
            ],
            [
               'name'=>'User Cabildo',
               'type'=>1, // 1 = User, 2 = Admin, 3 = SuperAdmin
               'password'=> bcrypt('123456'),
               'apellido_paterno'=>'Paterno',
               'apellido_materno'=>'Marterno',
               'rut' =>'22.222.222-2',
               'fono'=>'963548898',
               'email'=>'userc@cenizas.cl',
               'zona'=>'2',
            ]
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
