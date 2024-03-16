<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('departement')->insert([
            'nama_department' => 'Body Shop',
            'deskripsi' => 'Make Body',
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Contoh tanggal pembuatan antara satu tahun yang lalu hingga sekarang
            'updated_at' => now(),
        ]);

        DB::table('departement')->insert([
            'nama_department' => 'Trim Chasis',
            'deskripsi' => 'Assembling Center',
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Contoh tanggal pembuatan antara satu tahun yang lalu hingga sekarang
            'updated_at' => now(),
        ]);

        DB::table('departement')->insert([
            'nama_department' => 'Painting',
            'deskripsi' => 'Paint body',
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Contoh tanggal pembuatan antara satu tahun yang lalu hingga sekarang
            'updated_at' => now(),
        ]);

        DB::table('departement')->insert([
            'nama_department' => 'PDC',
            'deskripsi' => 'For Utility',
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Contoh tanggal pembuatan antara satu tahun yang lalu hingga sekarang
            'updated_at' => now(),
        ]);

        DB::table('departement')->insert([
            'nama_department' => 'QC',
            'deskripsi' => 'For Checking Quality',
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Contoh tanggal pembuatan antara satu tahun yang lalu hingga sekarang
            'updated_at' => now(),
        ]);
    }
}
