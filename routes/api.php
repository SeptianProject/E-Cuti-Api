<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DataCutiController;
use App\Http\Controllers\Api\DataJenisCutiController;
use App\Http\Controllers\Api\DataPegawaiController;
use App\Http\Controllers\Api\JabatanController;
use App\Http\Controllers\Api\NotifikasiController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Data Pegawai endPoint
    Route::apiResource('/data-pegawais', DataPegawaiController::class);
    Route::apiResource('/jabatans', JabatanController::class);

    // Data User endPoint
    Route::apiResource('/users', UserController::class);
    Route::get('/users/nik/{nik}', [UserController::class, 'showByNik']);

    // Data Jenis Cuti endPoint
    Route::apiResource('/data-jenis-cutis', DataJenisCutiController::class);

    // Data Cuti endPoint
    Route::apiResource('/data-cutis', DataCutiController::class);
    Route::get('/data-cutis/nik/{nik}', [DataCutiController::class, 'showByNik']);

    // Data Notifikasi endPoint
    Route::apiResource('/notifikasis', NotifikasiController::class);
    Route::get('/notifikasis/nik/{nik}', [NotifikasiController::class, 'showByNik']);
    Route::get('/notifikasis/status/{status}', [NotifikasiController::class, 'showByStatus']);
    Route::get('/notifikasis/nik/{nik}/status/{status}', [NotifikasiController::class, 'showByNikAndStatus']);

    // Auth endPoint
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
