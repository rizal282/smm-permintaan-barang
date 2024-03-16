<?php

namespace App\Http\Services;

use Illuminate\Support\Collection;
use App\Http\Repositories\EmployeeRepo;

class EmployeeService {
    public static function getNIKPeminta(){
        return EmployeeRepo::getNIKPeminta();
    }

    public static function getPemintaByNIK($nik) {
        return EmployeeRepo::getPemintaByNIK($nik);
    }
}