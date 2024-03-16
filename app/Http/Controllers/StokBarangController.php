<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\StokBarangService;

class StokBarangController extends Controller
{
    public function getListNamaBarang(Request $request){
        $listNamaBarang = StokBarangService::getListNamaBarang();

        return response()->json([
            'data' => $listNamaBarang
        ]);
    }

    public function getDetailBarangByID(Request $request) {
        $detailBarang = StokBarangService::getDetailBarangByID($request->input('id_barang'));

        return response()->json([
            'data' => $detailBarang
        ]);
    }
}
