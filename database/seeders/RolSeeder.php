<?php

namespace Database\Seeders;

use App\Models\MotivoRechazo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        // ejemplos de permisos
        // Permission::create(['name' => 'buzon']);  
        // Permission::create(['name' => 'ver.cursos']);
        // Permission::create(['name' => 'crear.actividades']);
        // Permission::create(['name' => 'editar.actividades']);        

        $role = Role::create(['name' => 'Usuario']);

        // $role->givePermissionTo('buzon');       
     
        $role = Role::create(['name' => 'Profesor']);

        $role = Role::create(['name' => 'Administrador']);

        // asigna rol a usuario
        $usuario = User::where('id', 1)->first();
        $usuario->assignRole($role);
    }

}


