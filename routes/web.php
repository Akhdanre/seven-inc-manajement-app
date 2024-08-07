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
Route::post('/logout', [AuthController::class, 'actionlogout'])->name('actionLogout');

// Group for Dosen
Route::prefix('dosen')->middleware('role:2')->group(function () {
    Route::get('/', [DosenController::class, 'dosenView']);

});

// Group for Kaprodi
Route::prefix('kaprodi')->middleware('role:1')->group(function () {
    Route::get('/home', [KaprodiController::class, 'kaprodiView'])->name("kaprodi.home");
    Route::get('/data/dosen', [KaprodiController::class, 'kaprodiDataDosenView'])->name("kaprodi.data.dosen");
    Route::get('/data/kelas', [KaprodiController::class, 'kaprodiDatakelasView'])->name("kaprodi.data.kelas");
    Route::get("/kaprodi/data/dosen",[KaprodiController::class, 'kaprodiDataDosenView'])->name("kaprodi.data.dosen");
    Route::get("/kaprodi/data/add-dosen", [KaprodiController::class, 'kaprodiAddDosen'])->name("kaprodi.add.dosen");
    Route::post("/kaprodi/store-dosen", [KaprodiController::class, 'storeDosen'])->name("kaprodi.store.dosen");
    Route::get('/kaprodi/data/edit-dosen/{id}', [KaprodiController::class, 'editDosen'])->name('kaprodi.edit.dosen');
    Route::put('/kaprodi/update-dosen/{id}', [KaprodiController::class, 'updateDosen'])->name('kaprodi.update-dosen');
    Route::delete('/kaprodi/delete-dosen/{id}', [KaprodiController::class, 'deleteDosen'])->name('kaprodi.delete-dosen');
});

// Group for Mahasiswa
Route::prefix('mahasiswa')->middleware('role:3')->group(function () {
    Route::get('/home', [MahasiswaController::class, 'mahasiswaView']);
    Route::post('/action/update/data/request', [MahasiswaController::class, 'actionRequestUpdateData'])->name("actionRequestUpdateData");
});



