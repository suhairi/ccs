<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SenaraiController;
use App\Http\Controllers\SettingController;

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

    // Asas Tanaman
    Route::get('/tanaman', [SeasonController::class, 'tanaman'])->name('tanaman');
    Route::post('/tanaman', [SeasonController::class, 'storeTanaman'])->name('storeTanaman');


    // Settings
    Route::group(['namespace' => 'settings'], function() {

        Route::get('/users', [SettingController::class, 'index'])->name('settings.users');
        Route::get('/users/{id}', [SettingController::class, 'destroy'])->name('settings.user.delete');
        Route::get('/users/update/{id}', [SettingController::class, 'userUpdateForm'])->name('settings.user.update.form');
        Route::post('/users/update', [SettingController::class, 'userUpdate'])->name('settings.user.update');

        Route::get('/educations', [SettingController::class, 'education'])->name('settings.educations');
        Route::get('/educations/{id}', [SettingController::class, 'destroyEdu'])->name('settings.education.delete');
        Route::get('/education/update/{id}', [SettingController::class, 'educationUpdateForm'])->name('settings.education.update.form');
        Route::post('/education/update', [SettingController::class, 'educationUpdate'])->name('settings.education.update');

        Route::get('/localitites', [SettingController::class, 'locality'])->name('settings.localitites');

        
    });

    // Senarai 
    Route::get('/senarai/pesawah', [SenaraiController::class, 'index'])->name('senaraiPesawah');

}); // end group middleware('auth')







