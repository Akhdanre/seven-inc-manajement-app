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
    Route::get('/home', [DosenController::class, 'dosenView'])->name("dosen.home");
    Route::get('/data/mahasiswa', [DosenController::class, 'dosenDataMahasiswa'])->name("dosen.data.mahasiswa");
    Route::get('/data/mahasiswa/add', [DosenController::class, 'addDataMahasiswaView'])->name("dosen.add.data.mahasiswa");
    Route::get('/data/mahasiswa/edit/{id}', [DosenController::class, 'editDataMahasiswaView'])->name('dosen.edit.data.mahasiswa');

    Route::post('/action/data/mahasiswa/add', [DosenController::class, 'actionAddDataMahasiswa']);
    Route::post('/action/data/mahasiswa/edit', [DosenController::class, 'actionEditDataMahasiswa'])->name("dosen.action.edit.data.mahasiswa");
    Route::delete('/action/data/mahasiswa/delete/{id}', [DosenController::class, 'actionDeleteDataMahasiswa'])->name("dosen.delete.data.mahasiswa");
});

// Group for Kaprodi
Route::prefix('kaprodi')->middleware('role:1')->group(function () {
    Route::get('/home', [KaprodiController::class, 'kaprodiView'])->name("kaprodi.home");
    Route::get('/data/dosen', [KaprodiController::class, 'kaprodiDataDosenView'])->name("kaprodi.data.dosen");
    Route::get('/data/kelas', [KaprodiController::class, 'kaprodiDatakelasView'])->name("kaprodi.data.kelas");
    Route::get("/data/dosen", [KaprodiController::class, 'kaprodiDataDosenView'])->name("kaprodi.data.dosen");
    Route::get("/data/add-dosen", [KaprodiController::class, 'kaprodiAddDosen'])->name("kaprodi.add.dosen");
    Route::post("/store-dosen", [KaprodiController::class, 'storeDosen'])->name("kaprodi.store.dosen");
    Route::get('/data/edit-dosen/{id}', [KaprodiController::class, 'editDosen'])->name('kaprodi.edit.dosen');
    Route::put('/update-dosen/{id}', [KaprodiController::class, 'updateDosen'])->name('kaprodi.update-dosen');
    Route::delete('/delete-dosen/{id}', [KaprodiController::class, 'deleteDosen'])->name('kaprodi.delete-dosen');
    Route::get("/data/add-kelas", [KaprodiController::class, 'kaprodiAddKelas'])->name("kaprodi.add.kelas");
    Route::post("/store-kelas", [KaprodiController::class, 'storeKelas'])->name("kaprodi.store.kelas");
    Route::get('/data/edit-kelas/{id}', [KaprodiController::class, 'editKelas'])->name('kaprodi.edit.kelas');
    Route::put('/update-kelas/{id}', [KaprodiController::class, 'updateKelas'])->name('kaprodi.update-kelas');
    Route::delete('/delete-kelas/{id}', [KaprodiController::class, 'deleteKelas'])->name('kaprodi.delete-kelas');
    Route::get('/data/penempatan', [KaprodiController::class, 'kaprodiPenempatanView'])->name("kaprodi.data.penempatan");
    Route::get("/data/add-penempatan", [KaprodiController::class, 'kaprodiAddPenempatan'])->name("kaprodi.add.penempatan");
    Route::post("/store-penempatan", [KaprodiController::class, 'storePenempatan'])->name("kaprodi.store.penempatan");
    Route::get('/data/edit-penempatan/{id}', [KaprodiController::class, 'editPenempatan'])->name('kaprodi.edit.penempatan');
    Route::put('/kaprodi/update-penempatan/{id}', [KaprodiController::class, 'updatePenempatan'])->name('kaprodi.update.penempatan');
    Route::delete('/delete-penempatan/{id}', [KaprodiController::class, 'deletePenempatan'])->name('kaprodi.delete-penempatan');
});

// Group for Mahasiswa
Route::prefix('mahasiswa')->middleware('role:3')->group(function () {
    Route::get('/home', [MahasiswaController::class, 'mahasiswaView']);
    Route::post('/action/update/data/request', [MahasiswaController::class, 'actionRequestUpdateData'])->name("actionRequestUpdateData");
});
