<?php

use App\Http\Controllers\AuthController;
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


Route::get("/college/home", function () {
    return view("testing");
});
Route::get("/HSP/home", function () {
    return view("page1");
});
Route::get("/lecture/home", function () {
    return view("page2");
});
