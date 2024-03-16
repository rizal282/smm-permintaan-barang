<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StokBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            $id_barang = explode("-", $faker->unique()->uuid);
            DB::table('stok_barang')->insert([
                'id_barang' => $id_barang[0],
                'nama_barang' => $faker->word . "-".$index,
                'tersedia' => $faker->numberBetween(0, 100),
                'satuan' => $faker->randomElement(['kg', 'gram', 'pcs']),
                'id_lokasi' => $faker->numberBetween(1, 10),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
