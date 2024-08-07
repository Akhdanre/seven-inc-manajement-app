<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login']);
Route::post('/actionLogin', [AuthController::class, 'actionLogin'])->name("actionLogin");


Route::get('/dosen', [DosenController::class, 'dosenView']);


Route::get("/kaprodi/home", [KaprodiController::class, 'kaprodiView'])->name("kaprodi.home");
Route::get("/kaprodi/data/dosen", [KaprodiController::class, 'kaprodiDataDosenView'])->name("kaprodi.data.dosen");
Route::get("/kaprodi/data/kelas", [KaprodiController::class, 'kaprodiDatakelasView'])->name("kaprodi.data.kelas");

Route::get("/mahasiswa/home", [MahasiswaController::class, 'mahasiswaView']);
Route::post("/action/update/data/request", [MahasiswaController::class, 'actionRequestUpdateData'])->name("actionRequestUpdateData");
