<?php

namespace App\Http\Repositories;

use App\Http\Models\Barang;

class StokBarangRepo {

   public static function getListNamaBarang(){
        return Barang::select('id_barang', 'nama_barang')
               //  ->join('lokasi_barang', 'stok_barang.id_lokasi', '=', 'lokasi_barang.id')  'tersedia', 'satuan', 'nama_lokasi'
                ->get();
   }

   public static function getDetailBarangByID($id) {
      return Barang::select('id_barang', 'nama_barang', 'tersedia', 'satuan', 'nama_lokasi')
                ->join('lokasi_barang', 'stok_barang.id_lokasi', '=', 'lokasi_barang.id') 
                ->where('id_barang', $id) 
                ->first();
   }

   public static function getSingleStockBarangByID($id) {
      return Barang::select('id_barang', 'tersedia')->where('id_barang', $id)->first();
   }

   public static function updateStockBarangByID($data, $id) {
      return Barang::where('id_barang', $id)->update($data);
   }

}