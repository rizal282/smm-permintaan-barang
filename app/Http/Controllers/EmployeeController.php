<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\EmployeeService;

class EmployeeController extends Controller
{
    public function getNIKPeminta(Request $request){
        $listNIKPeminta = EmployeeService::getNIKPeminta();

        return response()->json([
            'data' => $listNIKPeminta
        ]);
    }

    public function getPemintaByNIK(Request $request) {
        $nik = EmployeeService::getPemintaByNIK($request->input('nik'));

        return response()->json([
            'data' => $nik
        ]);
    }
}
