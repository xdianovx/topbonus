<?php

use App\Http\Controllers\BonusController;
use App\Http\Controllers\CasinoBonusController;
use App\Http\Controllers\CasinoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Site\HomePage;
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




Route::get('/', [HomePage::class, 'index'])->name('index');

Route::name('casinos.')->prefix('casinos')->group(function () {
    Route::get('/', function () {
        return view('pages.casinos.index');
    })->name('index');
});


Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.admin');
    })->name('index');

    // Casinos
    Route::name('casino.')->prefix('casino')->group(function () {
        Route::get('/', [CasinoController::class, 'index'])->name('index');
        Route::get('/create', [CasinoController::class, 'create'])->name('create');
        Route::post('/store', [CasinoController::class, 'store'])->name('store');
        Route::delete('/store/{id}', [CasinoController::class, 'destroy'])->name('destroy');
    });

    // Bonus
    Route::name('bonus.')->prefix('bonus')->group(function () {
        Route::get('/', [BonusController::class, 'index'])->name('index');
        Route::get('/create', [BonusController::class, 'create'])->name('create');
    });

    //Bonus Codes (Те что карточки)
    Route::name('bonus_code.')->prefix('bonus_code')->group(function () {
        Route::get('/', [CasinoBonusController::class, 'index'])->name('index');
        Route::get('/create', [CasinoBonusController::class, 'create'])->name('create');
        Route::post('/store', [CasinoBonusController::class, 'store'])->name('store');
    });
});
