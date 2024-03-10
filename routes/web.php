<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\AppCommentsController;
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


// Hotel Management Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('/hotels', HotelsController::class);
    Route::resource('/cities', CitiesController::class);
    Route::resource('/rooms', RoomsController::class);
    Route::resource('/reservations', ReservationsController::class);
    Route::resource('/payments', PaymentsController::class);
    Route::resource('/comments', AppCommentsController::class);
});

// Standart Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
