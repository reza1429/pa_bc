<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/list_kelas', 'KelasController@getListKelas');
Route::get('list_kelas', [KelasController::class, 'getListKelas']);
Route::get('detail_kelas', [KelasController::class, 'getDetailKelas']);
Route::post('kelas_tambah', [KelasController::class, 'store']);
Route::put('kelas_ubah/{id}', [KelasController::class, 'update']);
Route::get('list_siswa', [SiswaController::class, 'getListSiswa']);
Route::get('detail_siswa', [SiswaController::class, 'getDetailSiswa']);
Route::get('detail_nilai', [NilaiController::class, 'getDetailNilai']);
Route::put('nilai_tambah', [NilaiController::class, 'store']);