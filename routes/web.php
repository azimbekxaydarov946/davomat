<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDayController;

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


Route::group(['middleware' => 'auth'], function () {
;

    Route::post('auth', [\App\Http\Controllers\UserAuthController::class, 'login'])->name('authUser');
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

    Route::post('dayUser', [UserDayController::class, 'store'])->name('dayUserStore');
    Route::delete('dayUserSingle/{id}', [UserDayController::class, 'destroy'])->name('dayUserDestroy');
    Route::delete('dayUser/{id}', [UserDayController::class, 'delete'])->name('dayUserDestroySingle');


    Route::put('users/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::get('users/{id}', [UserController::class, 'edit'])->name('userEdit');

    Route::group([ 'middleware' => ['adminRole']], function () {


        Route::resource('dayUser', UserDayController::class)->except('store', 'destroy', 'edit', 'update');


        Route::get('dayUsers/{id}', [UserDayController::class, 'edit'])->name('dayUserEdit');

        Route::put('dayUsers/{id}', [UserDayController::class, 'update'])->name('dayUserUpdate');

        Route::get('user', [UserController::class, 'index'])->name('userIndex');
        Route::get('users', [UserController::class, 'create'])->name('userCreate');
        Route::post('userss', [UserController::class, 'store'])->name('userStore');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('userDestroy');

    });
});
