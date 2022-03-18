<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TugasController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::controller(MahasiswaController::class)->group(function () {
        Route::get("/mahasiswa", 'index');
        Route::get("/mahasiswa/{nim}", 'show');
        Route::post("/mahasiswa", 'store');
        Route::put("/mahasiswa/{nim}", 'update');
        Route::delete("/mahasiswa/{nim}", 'destroy');
    });
    Route::controller(MataKuliahController::class)->group(function () {
        Route::get("/matkul", 'index');
        Route::get("/matkul/{kode_matkul}", 'show');
        Route::post("/matkul", 'store');
        Route::put("/matkul/{kode_matkul}", 'update');
        Route::delete("/matkul/{kode_matkul}", 'destroy');
    });
    Route::controller(TugasController::class)->group(function () {
        Route::get("/tugas", 'index');
        Route::get("/tugas/{nomor_tugas}", 'show');
        Route::post("/tugas", 'store');
        Route::put("/tugas/{nomor_tugas}", 'update');
        Route::delete("/tugas/{nomor_tugas}", 'destroy');
    });
    Route::controller(NoteController::class)->group(function () {
        Route::get("/note", 'index');
        Route::get("/note/{nomor_note}", 'show');
        Route::post("/note", 'store');
        Route::put("/note/{nomor_note}", 'update');
        Route::delete("/note/{nomor_note}", 'destroy');
    });
});
