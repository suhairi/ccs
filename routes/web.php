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


Route::middleware('auth')->group(function () {

    //Pesawah
    Route::get('/pesawah', [FarmerController::class, 'index'])->name('pesawah');
    Route::post('/pesawah', [FarmerController::class, 'store'])->name('postPesawah');

    // Musim
    Route::get('/musim', [SeasonController::class, 'index'])->name('musim');
    Route::post('/musim', [SeasonController::class, 'carian'])->name('carianPesawah');
    Route::get('/musim/hasil/carian', [SeasonController::class, 'hasil'])->name('hasilCarian');
    Route::get('/musim/{id}', [SeasonController::class, 'musim'], 'musim')->name('musim2');
    Route::post('/musim/store', [SeasonController::class, 'store'])->name('storeMusim');


    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users');


    // Senarai 
    Route::get('/senarai/pesawah', [SenaraiController::class, 'index'])->name('senaraiPesawah');

});







