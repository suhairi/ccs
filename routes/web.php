<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SenaraiController;

use App\Models\User;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Pesawah
Route::get('/pesawah', [FarmerController::class, 'index'])->middleware('auth')->name('pesawah');
Route::post('/pesawah', [FarmerController::class, 'store'])->middleware('auth')->name('postPesawah');


// Musim
Route::get('/musim', [SeasonController::class, 'index'])->middleware('auth')->name('musim');
Route::post('/musim', [SeasonController::class, 'carian'])->middleware('auth')->name('carianPesawah');
Route::get('/musim/hasil/carian', [SeasonController::class, 'hasil'])->middleware('auth')->name('hasilCarian');
Route::get('/musim/{id}', [SeasonController::class, 'musim'], 'musim')->middleware('auth')->name('musim2');


// Users
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users');


// Senarai 
Route::get('/senarai/pesawah', [SenaraiController::class, 'index'])->middleware('auth')->name('senaraiPesawah');


