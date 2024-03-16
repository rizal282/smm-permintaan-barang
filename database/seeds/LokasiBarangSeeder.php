<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LokasiBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('lokasi_barang')->insert([
                'nama_lokasi' => $faker->word,
                'deskripsi' => $faker->sentence,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
        
    }
}
