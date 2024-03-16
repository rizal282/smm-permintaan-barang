<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermintaanBarangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/permintaanbarang/inquiry', function () {
    return view('inquiry');
});

Route::get('/employee/nikpeminta', [EmployeeController::class, 'getNIKPeminta']);
Route::get('/employee/pemintabynik', [EmployeeController::class, 'getPemintaByNIK']);
Route::get('/stokbarang/listnamabarang', [StokBarangController::class, 'getListNamaBarang']);
Route::get('/stokbarang/getdetailbarang', [StokBarangController::class, 'getDetailBarangByID']);
Route::post('/permintaanbarang/insertpermintaan', [PermintaanBarangController::class, 'insertPemintaanBarang']);
Route::get('/permintaanbarang/inquirypermintaanbarang', [PermintaanBarangController::class, 'inquiryPermintaanBarang']);
