<?php

namespace App\Http\Services;

use App\Http\Repositories\PermintaanBarangRepo;
use App\Http\Repositories\StokBarangRepo;

class PermintaanBarangService {
    public static function insertPermintaanBarang($dataBarang) {

        for($i = 0; $i < count($dataBarang); $i++) {
            $id_barang = $dataBarang[$i]['id_barang'];
            $kuantiti = $dataBarang[$i]['kuantiti'];

            $barang = StokBarangRepo::getSingleStockBarangByID($id_barang);

            $kurangi_stok = $barang->tersedia - $kuantiti;

            $data = ['tersedia' => $kurangi_stok];

            StokBarangRepo::updateStockBarangByID($data, $id_barang);
        }

        return PermintaanBarangRepo::insertPermintaanBarang($dataBarang);
    }

    public static function inquiryPermintaanBarang() {
        return PermintaanBarangRepo::inquiryPermintaanBarang();
    }
}