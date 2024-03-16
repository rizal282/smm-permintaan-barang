<?php

namespace App\Http\Services;

use App\Http\Repositories\StokBarangRepo;

class StokBarangService {
    public static function getListNamaBarang(){
        return StokBarangRepo::getListNamaBarang();
    }

    public static function getDetailBarangByID($id) {
        return StokBarangRepo::getDetailBarangByID($id);
    }
}