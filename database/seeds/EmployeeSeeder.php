<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Employee;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Employee::factory()->count(10)->create();
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('employee')->insert([
                'nik' => $faker->unique()->randomNumber(8), // Contoh nik dengan 8 digit acak
                'nama' => $faker->name,
                'department_id' => $faker->numberBetween(1, 5), // Contoh department_id antara 1 hingga 10
                'doj' => $faker->date(),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Contoh tanggal pembuatan antara satu tahun yang lalu hingga sekarang
                'updated_at' => now(),
            ]);
        }
    }
}
