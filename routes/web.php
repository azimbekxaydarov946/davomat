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


    Route::get('users/{id}', [UserController::class, 'edit'])->name('userEdit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('userUpdate');

    Route::group([ 'middleware' => ['adminRole']], function () {

        Route::resource('food', FoodController::class)->except('store', 'destroy', 'edit', 'update');
        Route::delete('food/{id}', [FoodController::class, 'destroy'])->name('foodDestroy');
        Route::post('food', [FoodController::class, 'store'])->name('foodStore');

        Route::get('foods/{id}', [FoodController::class, 'edit'])->name('foodEdit');
        Route::put('foods/{id}', [FoodController::class, 'update'])->name('foodUpdate');

        // Route::resource('day', DayController::class)->except('store', 'destroy', 'edit', 'update');
        // Route::delete('day/{id}', [DayController::class, 'destroy'])->name('dayDestroy');
        // Route::post('day', [DayController::class, 'store'])->name('dayStore');

        // Route::get('days/{id}', [DayController::class, 'edit'])->name('dayEdit');
        // Route::put('days/{id}', [DayController::class, 'update'])->name('dayUpdate');

        Route::resource('dayUser', UserDayController::class)->except('store', 'destroy', 'edit', 'update');


        Route::get('dayUsers/{id}', [UserDayController::class, 'edit'])->name('dayUserEdit');

        Route::put('dayUsers/{id}', [UserDayController::class, 'update'])->name('dayUserUpdate');

        Route::get('user', [UserController::class, 'index'])->name('userIndex');
        Route::get('users', [UserController::class, 'create'])->name('userCreate');
        Route::post('userss', [UserController::class, 'store'])->name('userStore');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('userDestroy');

        Route::get('payment', [PaymentController::class, 'index'])->name('payme.index');
        Route::get('payment/create', [PaymentController::class, 'create'])->name('payme.create');
        Route::post('payment/store', [PaymentController::class, 'store'])->name('payme.store');
        Route::get('payment/edit/{id}', [PaymentController::class, 'edit'])->name('payme.edit');
        Route::put('payment/update/{id}', [PaymentController::class, 'update'])->name('payme.update');
        Route::delete('payment/delete/{id}', [PaymentController::class, 'delete'])->name('payme.delete');
    });
});
