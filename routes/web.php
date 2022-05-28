<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenangananController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\ObatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->middleware('guest')->name('login');

Route::post('/login', [AuthController::class, 'auth']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('/wilayah', WilayahController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/pegawai', PegawaiController::class)->middleware('auth');
Route::resource('/pasien', PasienController::class)->middleware('auth');
Route::resource('/penanganan', PenangananController::class)->middleware('auth');
Route::resource('/tindakan', TindakanController::class)->middleware('auth');
Route::resource('/obat', ObatController::class)->middleware('auth');
Route::resource('/transaksi', ObatController::class)->middleware('auth');

Route::get('/home', function () {
    return view('dashboard');
})->middleware('auth');

