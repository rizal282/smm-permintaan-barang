<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'nik' => $faker->unique()->randomNumber(8), // Contoh nik dengan 8 digit acak
        'nama' => $faker->name,
        'department_id' => $faker->numberBetween(1, 10), // Contoh department_id antara 1 hingga 10
        'doj' => $faker->date(),
        'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Contoh tanggal pembuatan antara satu tahun yang lalu hingga sekarang
        'updated_at' => now(),
    ];
});
