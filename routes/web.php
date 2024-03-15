<?php

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

Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'registrationForm'])->name('registration_form');
Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'store'])->name('registration_store');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/ability_page', [App\Http\Controllers\UserController::class, 'abilityPage'])->name('ability_page');
    Route::get('/refresh', [App\Http\Controllers\AuthController::class, 'refresh'])->name('refresh');
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
