<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROLES
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Empleado']);
        $role3 = Role::create(['name' => 'Cliente']);

        // DASHBOARD
        Permission::create([
            'name' => 'admin.home',
            'descripcion' => 'Dashboard'
        ])->syncRoles([$role1, $role2]);

        // USUARIOS
        Permission::create([
            'name' => 'admin.activitylog.index',
            'descripcion' => 'REGISTRO DE ACTIVIDADES'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.menu',
            'descripcion' => 'MENU USUARIOS'
        ])->syncRoles([$role1]);
        //---------------------------------------------------
        Permission::create([
            'name' => 'users.index',
            'descripcion' => 'Listar usuarios'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.create',
            'descripcion' => 'Crear usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.show',
            'descripcion' => 'Ver usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.edit',
            'descripcion' => 'Editar usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'users.destroy',
            'descripcion' => 'Eliminar usuario'
        ])->syncRoles([$role1]);

        // PERMISOS
        Permission::create([
            'name' => 'roles.index',
            'descripcion' => 'Listar roles'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'roles.create',
            'descripcion' => 'Crear rol'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'roles.show',
            'descripcion' => 'Ver rol'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'roles.edit',
            'descripcion' => 'Editar rol'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'roles.destroy',
            'descripcion' => 'Eliminar rol'
        ])->syncRoles([$role1]);
        //---------------------------------------------------


        // MODULO PERSONAS
        Permission::create([
            'name' => 'admin.personas.menu',
            'descripcion' => 'MENU PERSONAS'
        ])->syncRoles([$role1, $role2]);
        //---------------------------------------------------
        // PERSONAS
        Permission::create([
            'name' => 'admin.personas.index',
            'descripcion' => 'Listar personas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.personas.create',
            'descripcion' => 'Crear persona'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.personas.show',
            'descripcion' => 'Ver persona'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.personas.edit',
            'descripcion' => 'Editar persona'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.personas.destroy',
            'descripcion' => 'Eliminar persona'
        ])->syncRoles([$role1, $role2]);

        // PROVEEDORES
        Permission::create([
            'name' => 'admin.proveedores.index',
            'descripcion' => 'Listar proveedores'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.proveedores.create',
            'descripcion' => 'Crear proveedor'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.proveedores.show',
            'descripcion' => 'Ver proveedor'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.proveedores.edit',
            'descripcion' => 'Editar proveedor'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.proveedores.destroy',
            'descripcion' => 'Eliminar proveedor'
        ])->syncRoles([$role1, $role2]);

        // CARGOS
        Permission::create([
            'name' => 'admin.cargos.index',
            'descripcion' => 'Listar cargos'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.cargos.create',
            'descripcion' => 'Crear cargo'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.cargos.show',
            'descripcion' => 'Ver cargo'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.cargos.edit',
            'descripcion' => 'Editar cargo'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.cargos.destroy',
            'descripcion' => 'Eliminar cargo'
        ])->syncRoles([$role1, $role2]);

        // CONTRATOS
        Permission::create([
            'name' => 'admin.contratos.index',
            'descripcion' => 'Listar contratos'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.contratos.create',
            'descripcion' => 'Crear contrato'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.contratos.show',
            'descripcion' => 'Ver contrato'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.contratos.edit',
            'descripcion' => 'Editar contrato'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.contratos.destroy',
            'descripcion' => 'Eliminar contrato'
        ])->syncRoles([$role1, $role2]);

        //---------------------------------------------------
        // MODULO ENTRADAS Y SALIDAS
        Permission::create([
            'name' => 'admin.entradas.menu',
            'descripcion' => 'MENU ENTRADAS Y SALIDAS'
        ])->syncRoles([$role1, $role2]);
        // FACTURAS
        Permission::create([
            'name' => 'admin.facturas.index',
            'descripcion' => 'Listar facturas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.facturas.create',
            'descripcion' => 'Crear facturas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.facturas.show',
            'descripcion' => 'Ver factura'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.facturas.edit',
            'descripcion' => 'Editar facturas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.facturas.destroy',
            'descripcion' => 'Eliminar facturas'
        ])->syncRoles([$role1, $role2]);

        // NOTAS
        Permission::create([
            'name' => 'admin.notas.index',
            'descripcion' => 'Listar notas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.notas.create',
            'descripcion' => 'Crear notas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.notas.show',
            'descripcion' => 'Ver nota'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.notas.edit',
            'descripcion' => 'Editar notas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.notas.destroy',
            'descripcion' => 'Eliminar notas'
        ])->syncRoles([$role1, $role2]);

        // METODOS DE PAGOS
        Permission::create([
            'name' => 'admin.pays.index',
            'descripcion' => 'Listar metodos de pago'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.pays.create',
            'descripcion' => 'Crear metodos de pago'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.pays.show',
            'descripcion' => 'Ver metodo de pago'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.pays.edit',
            'descripcion' => 'Editar metodos de pago'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.pays.destroy',
            'descripcion' => 'Eliminar metodos de pago'
        ])->syncRoles([$role1, $role2]);

        //---------------------------------------------------
        // MODULO PRODUCTOS Y SERVICIOS
        Permission::create([
            'name' => 'admin.productos.menu',
            'descripcion' => 'MENU PRODUCTOS Y SERVICIOS'
        ])->syncRoles([$role1, $role2]);
        // MEDIDAS
        Permission::create([
            'name' => 'admin.medidas.index',
            'descripcion' => 'Listar medidas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.medidas.create',
            'descripcion' => 'Crear medidas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.medidas.show',
            'descripcion' => 'Ver medida'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.medidas.edit',
            'descripcion' => 'Editar medidas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.medidas.destroy',
            'descripcion' => 'Eliminar medidas'
        ])->syncRoles([$role1, $role2]);

        // MARCAS
        Permission::create([
            'name' => 'admin.marcas.index',
            'descripcion' => 'Listar marcas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.marcas.create',
            'descripcion' => 'Crear marcas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.marcas.show',
            'descripcion' => 'Ver marca'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.marcas.edit',
            'descripcion' => 'Editar marcas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.marcas.destroy',
            'descripcion' => 'Eliminar marcas'
        ])->syncRoles([$role1, $role2]);

        // MATERIALES
        Permission::create([
            'name' => 'admin.materiales.index',
            'descripcion' => 'Listar materiales'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.materiales.create',
            'descripcion' => 'Crear materiales'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.materiales.show',
            'descripcion' => 'Ver material'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.materiales.edit',
            'descripcion' => 'Editar materiales'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.materiales.destroy',
            'descripcion' => 'Eliminar materiales'
        ])->syncRoles([$role1, $role2]);

        // MATERIALES
        Permission::create([
            'name' => 'admin.servicios.index',
            'descripcion' => 'Listar servicios'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.servicios.create',
            'descripcion' => 'Crear servicios'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.servicios.show',
            'descripcion' => 'Ver servicio'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.servicios.edit',
            'descripcion' => 'Editar servicios'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.servicios.destroy',
            'descripcion' => 'Eliminar servicios'
        ])->syncRoles([$role1, $role2]);
    }
}
