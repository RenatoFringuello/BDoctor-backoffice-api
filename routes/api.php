<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiDoctorsController;
use App\Http\Controllers\api\ApiSpecializationsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/doctors', [ApiDoctorsController::class, 'index'])->name('api.doctors.index');
Route::get('/specializations', [ApiSpecializationsController::class, 'index'])->name('api.specializations.index');
