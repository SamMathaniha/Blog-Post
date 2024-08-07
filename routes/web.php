<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Define the main landing route
Route::get('/', function () {
    return view('welcome');
});

// Define the home route with HomeController
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');



/* // Define the dashboard route with middleware and name it
Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure this view exists
})->middleware(['auth', 'verified'])->name('dashboard');
 */

// Define routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';
