<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Services\PermintaanBarangService;

class PermintaanBarangController extends Controller
{
    public function insertPemintaanBarang(Request $request) {
        $requestData = $request->all();
 
        return response()->json([
            'data' => PermintaanBarangService::insertPermintaanBarang($requestData)
        ]);
    }

    public function inquiryPermintaanBarang(Request $request) {
        return response()->json([
            'data' => PermintaanBarangService::inquiryPermintaanBarang()
        ]);
    }
}
