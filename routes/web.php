<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('pesawah', function() {
    return view('forms.pesawah');
})->middleware('auth')->name('pesawah');

Route::get('musim', function() {
    return view('forms.musim');
})->middleware('auth')->name('musim');

Route::post('pesawah', [PostController::class, 'store'])->name('postPesawah');


