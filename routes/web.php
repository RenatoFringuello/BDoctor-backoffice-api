<?php

use App\Http\Controllers\Auth\ProfileController as AuthProfileController;

use App\Http\Controllers\BraintreeController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SponsorsController;
use Illuminate\Support\Facades\Auth;
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
        $messages = Auth::user()->messages;
        $reviews = Auth::user()->reviews;
        return view('dashboard', compact('messages', 'reviews'));
    })->name('dashboard');

    // Profile Register
    Route::get('profile/register', [AuthProfileController::class, 'edit'])
        ->name('profile.register');

    Route::put('profile/update', [AuthProfileController::class, 'update'])
        ->name('profile.register.update');

    Route::resource('/messages', MessagesController::class);
    Route::resource('/reviews', ReviewsController::class);
    Route::resource('/sponsors', SponsorsController::class);
});

// Route for payment
Route::get('/payment', [BraintreeController::class, 'token'])->name('payment');
Route::post('/payment/process', [BraintreeController::class, 'process'])->name('payment.process');

require __DIR__ . '/auth.php';
