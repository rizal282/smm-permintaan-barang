<?php

namespace App\Http\Repositories;

use App\Http\Models\PermintaanBarang;

class PermintaanBarangRepo {
    
    public static function insertPermintaanBarang($dataBarang) {
        return PermintaanBarang::insert($dataBarang);
    }

    public static function inquiryPermintaanBarang() {
        return PermintaanBarang::select('employee.nama', 'departement.nama_department', 'stok_barang.nama_barang', 'lokasi_barang.nama_lokasi', 'stok_barang.tersedia', 'kuantiti', 'keterangan', 'status')
                ->join('stok_barang', 'permintaan_barang.id_barang', '=', 'stok_barang.id_barang')
                ->join('employee', 'permintaan_barang.id_employee', '=', 'employee.nik')
                ->join('departement', 'employee.department_id', '=', 'departement.id')
                ->join('lokasi_barang', 'lokasi_barang.id', '=', 'stok_barang.id_lokasi')
                ->get();
    }

}