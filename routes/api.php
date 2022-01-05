<?php

use App\Http\Controllers\Api\AnggranController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BidangController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\KegiatanController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user', [AuthController::class, 'get_user']);
Route::post('/add-user', [AuthController::class, 'create_user']);
Route::post('/reset-password/{id}', [AuthController::class, 'reset_password']);
Route::delete('/user/{id}', [AuthController::class, 'hapus_user']);

Route::get('/bidang', [BidangController::class, 'index']);
Route::post('/bidang', [BidangController::class, 'store']);
Route::delete('/bidang/{id}', [BidangController::class, 'delete']);

Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::post('/kegiatan', [KegiatanController::class, 'store']);
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'delete']);

Route::get('/anggaran', [AnggranController::class, 'index']);
Route::post('/anggaran', [AnggranController::class, 'store']);
Route::delete('/anggaran/{id}', [AnggranController::class, 'delete']);
Route::get('/anggaran-excel', [AnggranController::class, 'anggaran_excel']);

Route::get('/anggaran-excel_id/{id}', [AnggranController::class, 'anggaran_excel_id']);
