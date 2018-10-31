<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(]UserTableSeeder::class);
        $this->call(EmpleadoTableSeeder::class);
        $this->call(VehiculoTableSeeder::class);
        $this->call(RutaTableSeeder::class);

        $this->call(HomeTableSeeder::class);
//
       


        //Model::reguard();
    }
}
