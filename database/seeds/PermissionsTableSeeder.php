<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role

        Permission::create([
        	'name' => 'Navegar roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name' => 'Ver los detalles de rol',
        	'slug' => 'roles.show',
        	'description' => 'Ver en detalle cada rol',
        ]);
        Permission::create([
        	'name' => 'Edicion de roles',
        	'slug' => 'roles.edit',
        	'description' => 'Editar Cualquier dato de un rol',
        ]);
        Permission::create([
        	'name' => 'Eliminar roles',
        	'slug' => 'roles.destroy',
        	'description' => 'Elimina rol seleccionado del sistema',
        ]);
        Permission::create([
        	'name' => 'Crear roles',
        	'slug' => 'roles.create',
        	'description' => 'Crea rol en el sistema',
        ]);
        //Usuarios

        Permission::create([
        	'name' => 'Navegar usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name' => 'Ver los detalles de usuarios',
        	'slug' => 'users.show',
        	'description' => 'Ver en detalle cada usuario',
        ]);
        Permission::create([
        	'name' => 'Edicion de usuarios',
        	'slug' => 'users.edit',
        	'description' => 'Editar Cualquier dato de un usaurio',
        ]);
        Permission::create([
        	'name' => 'Eliminar usuarios',
        	'slug' => 'users.destroy',
        	'description' => 'Elimina usuario seleccionado del sistema',
        ]);
        Permission::create([
        	'name' => 'Crear usuarios',
        	'slug' => 'users.createuser',
        	'description' => 'Crea usuario en el sistema',
        ]);
        Permission::create([
            'name' => 'Agendar',
            'slug' => 'home.agendar',
            'description' => 'Agendamiento de conductores y rutas en el sistema',
        ]);

        //Conductores

        Permission::create([
        	'name' => 'Navegar conductores',
        	'slug' => 'empleado.indexEmpleado',
        	'description' => 'Lista y navega todos los conductores del sistema',
        ]);

        Permission::create([
        	'name' => 'Edicion de conductores',
        	'slug' => 'empleado.editEmpleado',
        	'description' => 'Editar Cualquier dato de un usaurio',
        ]);
        Permission::create([
        	'name' => 'Eliminar conductores',
        	'slug' => 'empleado.destroyEmpleado',
        	'description' => 'Elimina usuario seleccionado del sistema',
        ]);
        Permission::create([
        	'name' => 'Crear conductores',
        	'slug' => 'empleado.createEmpleado',
        	'description' => 'Crea conductores en el sistema',
        ]);
        Permission::create([
        	'name' => 'Asignar Vehiculos',
        	'slug' => 'empleadoVehiculo.asignaempleadovehiculo',
        	'description' => 'Asignar empleados a los vehiculos',
        ]);




        //Vehiculos

        Permission::create([
        	'name' => 'Navegar vehiculos',
        	'slug' => 'vehiculo.indexVehiculo',
        	'description' => 'Lista y navega todos los vehiculo del sistema',
            ]);
        Permission::create([
        	'name' => 'Asignar Rutas',
        	'slug' => 'rutasvehiculos.asignarutasvehiculo',
        	'description' => 'Asignar rutas a vehiculos',
        ]);

        Permission::create([
        	'name' => 'Edicion de vehiculo',
        	'slug' => 'vehiculo.editVehiculo',
        	'description' => 'Editar Cualquier dato de un vehiculo',
        ]);
        Permission::create([
        	'name' => 'Eliminar vehiculo',
        	'slug' => 'vehiculo.destroyVehiculo',
        	'description' => 'Elimina vehiculo seleccionado del sistema',
        ]);
        Permission::create([
        	'name' => 'Crear vehiculo',
        	'slug' => 'vehiculo.createVehiculo',
        	'description' => 'Crea vehiculo en el sistema',
        ]);

        //Rutas

        Permission::create([
            'name' => 'Navegar rutas',
            'slug' => 'rutas.rutaindex',
            'description' => 'Lista y navega todos los nombres de las rutas del sistema',
        ]);

        Permission::create([
            'name' => 'Eliminar rutas',
            'slug' => 'rutas.destroyruta',
            'description' => 'Elimina ruta seleccionado del sistema',
        ]);
        Permission::create([
            'name' => 'Crear rutas',
            'slug' => 'rutas.rutacreate',
            'description' => 'Crea rutas en el sistema',
        ]);
        Permission::create([
            'name' => 'index ubicacion',
            'slug' => 'rutas.indexubicacion',
            'description' => 'lista de ubicacion de rutas',
        ]);
    }
        //Reportes

        Permission::create([
            'name' => 'Repoerte Horas Extras',
            'slug' => 'home.horas_extras',
            'description' => 'Listado de reportes de horas extras por conductor',
        ]);

        Permission::create([
            'name' => 'Rutas conductor',
            'slug' => 'home.rutas_conductor',
            'description' => 'Reporte de rutas por conductor en el sistema',
        ]);
        Permission::create([
            'name' => 'Conductor Vehiculo',
            'slug' => 'home.conductores_vehiculos',
            'description' => 'Reporte de conductores por vehiculos en rutas en el sistema',
        ]);
        
    }
}
