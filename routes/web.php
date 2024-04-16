<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DtAbsensiController;
use App\Http\Controllers\DtKaryawanController;

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
    return view('welcome');
});


Route::resource('karyawan', DtKaryawanController::class);
Route::resource('absensi', DtAbsensiController::class);