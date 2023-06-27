<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1 = Role::create(['name'=>'Admin']);
       $role2 = Role::create(['name'=>'Lector']);
       $role3 = Role::create(['name'=>'Empleado']);

       Permission::create(['name'=>'productos.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name'=>'productos.create'])->syncRoles([$role1,$role3]);
       Permission::create(['name'=>'productos.view'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name'=>'productos.edit'])->syncRoles([$role1,$role3]);
       Permission::create(['name'=>'productos.delete'])->syncRoles([$role1]);

       Permission::create(['name'=>'categorias.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name'=>'categorias.create'])->syncRoles([$role1,$role3]);
       Permission::create(['name'=>'categorias.view'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name'=>'categorias.edit'])->syncRoles([$role1,$role3]);
       Permission::create(['name'=>'categorias.delete'])->syncRoles([$role1]);

       Permission::create(['name'=>'pedidos.index'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name'=>'pedidos.view'])->syncRoles([$role1,$role2,$role3]);
       
    }
}
