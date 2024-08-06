<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\login_controller;
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

// Route::get('/dosen', [DosenController::class, 'dosenView']);
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');

Route::get('/dosen/mahasiswa', function () {
    return view('dosen.mahasiswa');
});

Route::get('/dosen/add-mahasiswa', function () {
    return view('dosen.add-mahasiswa');
});

Route::get('/dosen/edit-mahasiswa', function () {
    return view('dosen.edit-mahasiswa');
});

Route::get('/kaprodi', function () {
    return view('kaprodi.index');
});

Route::get('/kaprodi/kelas', function () {
    return view('kaprodi.kelas');
});

Route::get('/kaprodi/dosen', function () {
    return view('kaprodi.dosen');
});

Route::get('/kaprodi/add-kelas', function () {
    return view('kaprodi.add-kelas');
});

Route::get('/kaprodi/add-dosen', function () {
    return view('kaprodi.add-dosen');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa.index');
});

Route::get('/dosen', [DosenController::class, 'dosenView']);


Route::get("/kaprodi/home", [KaprodiController::class, 'kaprodiView'])->name("kaprodi.home");
Route::get("/kaprodi/data/dosen",[KaprodiController::class, 'kaprodiDataDosenView'])->name("kaprodi.data.dosen");
Route::get("/kaprodi/data/kelas",[KaprodiController::class, 'kaprodiDatakelasView'])->name("kaprodi.data.kelas");
