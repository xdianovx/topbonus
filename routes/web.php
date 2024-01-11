<?php

use App\Http\Controllers\AdminControllers\BonusCardController;
use App\Http\Controllers\AdminControllers\BonusTypeController;
use App\Http\Controllers\AdminControllers\CasinoController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\CountryController;
use App\Http\Controllers\AdminControllers\GameController;
use App\Http\Controllers\AdminControllers\GameTypeController;
use App\Http\Controllers\AdminControllers\MainController;
use App\Http\Controllers\AdminControllers\PageController;
use App\Http\Controllers\AdminControllers\SoftController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\CasinoBonusController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Site\HomePage;
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




Route::get('/', [HomePage::class, 'index'])->name('index');

Route::name('casinos.')->prefix('casinos')->group(function () {
    Route::get('/', function () {
        return view('pages.casinos.index');
    })->name('index');
});


Route::middleware('auth:sanctum')->name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('index');

    Route::name('bonus_cards.')->prefix('bonus_cards')->group(function () {
        Route::get('/', [BonusCardController::class, 'index'])->name('index');
        Route::get('/create', [BonusCardController::class, 'create'])->name('create');
        Route::post('/store', [BonusCardController::class, 'store'])->name('store');
        Route::get('/{bonus_card_slug}', [BonusCardController::class, 'show'])->name('show');
        Route::get('/{bonus_card_slug}/edit', [BonusCardController::class, 'edit'])->name('edit');
        Route::patch('/{bonus_card_slug}/update', [BonusCardController::class, 'update'])->name('update');
        Route::delete('/{bonus_card_slug}', [BonusCardController::class, 'destroy'])->name('destroy'); 
    });
    // Route::name('pages.')->prefix('pages')->group(function () {
    //     Route::get('/', [PageController::class, 'index'])->name('index');
    //     Route::get('/create', [PageController::class, 'create'])->name('create');
    //     Route::post('/store', [PageController::class, 'store'])->name('store');
    //     Route::get('/{page}', [PageController::class, 'show'])->name('show');
    //     Route::get('/{page}/edit', [PageController::class, 'edit'])->name('edit');
    //     Route::patch('/{page}', [PageController::class, 'show'])->name('show');
    //     Route::delete('/{page}', [PageController::class, 'destroy'])->name('destroy');
    // });
    Route::name('casinos.')->prefix('casinos')->group(function () {
        Route::get('/', [CasinoController::class, 'index'])->name('index');
        Route::get('/create', [CasinoController::class, 'create'])->name('create');
        Route::post('/store', [CasinoController::class, 'store'])->name('store');
        Route::get('/{casino_slug}', [CasinoController::class, 'show'])->name('show');
        Route::get('/{casino_slug}/edit', [CasinoController::class, 'edit'])->name('edit');
        Route::patch('/{casino_slug}/update', [CasinoController::class, 'update'])->name('update');
        Route::delete('/{casino_slug}', [CasinoController::class, 'destroy'])->name('destroy');
    });
    Route::name('categories.')->prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/{category_slug}', [CategoryController::class, 'show'])->name('show');
        Route::get('/{category_slug}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('/{category_slug}/update', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category_slug}', [CategoryController::class, 'destroy'])->name('destroy');
    });
    // Route::name('countries.')->prefix('countries')->group(function () {
    //     Route::get('/', [CountryController::class, 'index'])->name('index');
    //     Route::get('/create', [CountryController::class, 'create'])->name('create');
    //     Route::post('/store', [CountryController::class, 'store'])->name('store');
    //     Route::get('/{country}', [CountryController::class, 'show'])->name('show');
    //     Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('edit');
    //     Route::patch('/{country}', [CountryController::class, 'show'])->name('show');
    //     Route::delete('/{country}', [CountryController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('game_types.')->prefix('game_types')->group(function () {
    //     Route::get('/', [GameTypeController::class, 'index'])->name('index');
    //     Route::get('/create', [GameTypeController::class, 'create'])->name('create');
    //     Route::post('/store', [GameTypeController::class, 'store'])->name('store');
    //     Route::get('/{game_type}', [GameTypeController::class, 'show'])->name('show');
    //     Route::get('/{game_type}/edit', [GameTypeController::class, 'edit'])->name('edit');
    //     Route::patch('/{game_type}', [GameTypeController::class, 'show'])->name('show');
    //     Route::delete('/{game_type}', [GameTypeController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('bonus_types.')->prefix('bonus_types')->group(function () {
    //     Route::get('/', [BonusTypeController::class, 'index'])->name('index');
    //     Route::get('/create', [BonusTypeController::class, 'create'])->name('create');
    //     Route::post('/store', [BonusTypeController::class, 'store'])->name('store');
    //     Route::get('/{bonus_type}', [BonusTypeController::class, 'show'])->name('show');
    //     Route::get('/{bonus_type}/edit', [BonusTypeController::class, 'edit'])->name('edit');
    //     Route::patch('/{bonus_type}', [BonusTypeController::class, 'show'])->name('show');
    //     Route::delete('/{bonus_type}', [BonusTypeController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('softs.')->prefix('softs')->group(function () {
    //     Route::get('/', [SoftController::class, 'index'])->name('index');
    //     Route::get('/create', [SoftController::class, 'create'])->name('create');
    //     Route::post('/store', [SoftController::class, 'store'])->name('store');
    //     Route::get('/{soft}', [SoftController::class, 'show'])->name('show');
    //     Route::get('/{soft}/edit', [SoftController::class, 'edit'])->name('edit');
    //     Route::patch('/{soft}', [SoftController::class, 'show'])->name('show');
    //     Route::delete('/{soft}', [SoftController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('games.')->prefix('games')->group(function () {
    //     Route::get('/', [GameController::class, 'index'])->name('index');
    //     Route::get('/create', [GameController::class, 'create'])->name('create');
    //     Route::post('/store', [GameController::class, 'store'])->name('store');
    //     Route::get('/{game}', [GameController::class, 'show'])->name('show');
    //     Route::get('/{game}/edit', [GameController::class, 'edit'])->name('edit');
    //     Route::patch('/{game}', [GameController::class, 'show'])->name('show');
    //     Route::delete('/{game}', [GameController::class, 'destroy'])->name('destroy');
    // });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
