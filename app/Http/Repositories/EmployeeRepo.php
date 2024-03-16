<?php

namespace App\Http\Repositories;

use App\Http\Models\Employee;

class EmployeeRepo {
    public static function getNIKPeminta(){
        return Employee::select('nik')
        ->get();
    }

    public static function getPemintaByNIK($nik){
        return Employee::join('departement', 'employee.department_id', '=', 'departement.id')
        ->select('nik', 'nama', 'nama_department')
        ->where('nik', $nik)
        ->first();
    }
}