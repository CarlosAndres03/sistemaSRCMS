<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::create([
            'name'=>'Administrador',
            'estado'=>'0',
            'intentoSesion'=>'0',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin'),
        ]);
        $usuario2 = User::create([
            'name'=>'Usuario',
            'estado'=>'0',
            'intentoSesion'=>'0',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('user'),
        ]);
        $rolAdmin=Role::create(['name'=>'Administrador']);
        $permisosAdmin=Permission::pluck('id','id')->all();
        $rolAdmin->syncPermissions($permisosAdmin);

        $rolUser =Role::create(['name'=>'Usuario']);
        $permisosUser=Permission::whereIn('name', ['ver-control mínimo'])->pluck('id');
        $rolUser->syncPermissions($permisosUser);

        $usuario->assignRole([$rolAdmin]);
        $usuario2->assignRole([$rolUser]);


    }
}

