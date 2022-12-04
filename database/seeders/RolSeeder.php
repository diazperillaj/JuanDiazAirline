<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $rol1 = Role::create(['name' => 'administrador']);
        $rol2 = Role::create(['name' => 'dispatcher']);

        Permission::create(['name' => 'verAerolineas'])->syncRoles($rol1, $rol2);
        Permission::create(['name' => 'crearAerolineas'])->syncRoles($rol1);
        Permission::create(['name' => 'editarAerolineas'])->syncRoles($rol1);
        Permission::create(['name' => 'eliminarAerolineas'])->syncRoles($rol1);

        Permission::create(['name' => 'verVuelos'])->syncRoles($rol1, $rol2);
        Permission::create(['name' => 'crearVuelos'])->syncRoles($rol1, $rol2);
        Permission::create(['name' => 'editarVuelos'])->syncRoles($rol1, $rol2);
        Permission::create(['name' => 'eliminarVuelos'])->syncRoles($rol1, $rol2);
    }
}
