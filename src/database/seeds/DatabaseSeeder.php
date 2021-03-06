<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(SolicitudesCompraTableSeeder::class);
        $this->call(VentasTableSeeder::class);
    }
}
