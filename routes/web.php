<?php

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

Route::get('/', function () {
    return view('login');
});


Route::get('/dosen', function () {
    return view('dosen.index');
});

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