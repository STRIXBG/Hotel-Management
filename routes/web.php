<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\PaymentsController;
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
    return view('welcome');
});

//Route::resource('/hotels', [HotelsController::class, 'index']);
Route::resource('/hotels', HotelsController::class);
Route::resource('/cities', CitiesController::class);
Route::resource('/rooms', RoomsController::class);
Route::resource('/reservations', ReservationsController::class);
Route::resource('/payments', PaymentsController::class);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/post', [HomeController::class, 'post'])->middleware(['auth', 'admin'])->name('admin.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
