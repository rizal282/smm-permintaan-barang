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
        $this->call(EmployeeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(LokasiBarangSeeder::class);
        $this->call(StokBarangSeeder::class);
        
    }
}
