<?php

use App\Http\Controllers\Auth\ProfileController as AuthProfileController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    // Profile Edit
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Register
    Route::get('profile/register', [AuthProfileController::class, 'edit'])
        ->name('profile.register');

    Route::put('profile/update', [AuthProfileController::class, 'update'])
        ->name('profile.register.update');
});

require __DIR__ . '/auth.php';