<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/signin', 'login')->name('signin');
        Route::post('/signin', 'loginAuth')->name('signin');
        Route::get('/signup', 'register')->name('signup');
        Route::post('/signup', 'registerProcess')->name('signup');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/signout',[LoginController::class, 'logout'])->name('signout');
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });

    /* User */
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
    });
});
