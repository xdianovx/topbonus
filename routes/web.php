<?php

use App\Http\Controllers\AdminControllers\BonusCardController;
use App\Http\Controllers\AdminControllers\BonusTypeController;
use App\Http\Controllers\AdminControllers\CasinoController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\CertificatesOrgsController;
use App\Http\Controllers\AdminControllers\CountryController;
use App\Http\Controllers\AdminControllers\GameController;
use App\Http\Controllers\AdminControllers\GameTypeController;
use App\Http\Controllers\AdminControllers\LicensesOrgsController;
use App\Http\Controllers\AdminControllers\MainController;
use App\Http\Controllers\AdminControllers\PageController;
use App\Http\Controllers\AdminControllers\SoftController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\CasinoBonusController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Site\HomePage;
use App\Models\CertificatesOrgs;
use App\Models\LicensesOrgs;
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

Route::middleware('auth:sanctum')->name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('index');

    Route::name('bonus_cards.')->prefix('bonus_cards')->group(function () {
        Route::get('/', [BonusCardController::class, 'index'])->name('index');
        Route::get('/search',  [BonusCardController::class, 'search'])->name('search');
        Route::get('/create', [BonusCardController::class, 'create'])->name('create');
        Route::post('/store', [BonusCardController::class, 'store'])->name('store');
        Route::get('/{bonus_card_slug}', [BonusCardController::class, 'show'])->name('show');
        Route::get('/{bonus_card_slug}/edit', [BonusCardController::class, 'edit'])->name('edit');
        Route::patch('/{bonus_card_slug}/update', [BonusCardController::class, 'update'])->name('update');
        Route::delete('/{bonus_card_slug}', [BonusCardController::class, 'destroy'])->name('destroy'); 
    });
    Route::name('pages.')->prefix('pages')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('/search',  [PageController::class, 'search'])->name('search');
        Route::get('/create', [PageController::class, 'create'])->name('create');
        Route::post('/store', [PageController::class, 'store'])->name('store');
        Route::get('/{page_slug}', [PageController::class, 'show'])->name('show');
        Route::get('/{page_slug}/edit', [PageController::class, 'edit'])->name('edit');
        Route::patch('/{page_slug}', [PageController::class, 'update'])->name('update');
        Route::delete('/{page_slug}', [PageController::class, 'destroy'])->name('destroy');
    });
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
        Route::get('/search',  [CategoryController::class, 'search'])->name('search');
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
    Route::name('game_types.')->prefix('game_types')->group(function () {
        Route::get('/', [GameTypeController::class, 'index'])->name('index');
        Route::get('/search',  [GameTypeController::class, 'search'])->name('search');
        Route::get('/create', [GameTypeController::class, 'create'])->name('create');
        Route::post('/store', [GameTypeController::class, 'store'])->name('store');
        Route::get('/{game_type_slug}', [GameTypeController::class, 'show'])->name('show');
        Route::get('/{game_type_slug}/edit', [GameTypeController::class, 'edit'])->name('edit');
        Route::patch('/{game_type_slug}', [GameTypeController::class, 'update'])->name('update');
        Route::delete('/{game_type_slug}', [GameTypeController::class, 'destroy'])->name('destroy');
    });
    Route::name('bonus_types.')->prefix('bonus_types')->group(function () {
        Route::get('/', [BonusTypeController::class, 'index'])->name('index');
        Route::get('/search',  [BonusTypeController::class, 'search'])->name('search');
        Route::get('/create', [BonusTypeController::class, 'create'])->name('create');
        Route::post('/store', [BonusTypeController::class, 'store'])->name('store');
        Route::get('/{bonus_type_slug}', [BonusTypeController::class, 'show'])->name('show');
        Route::get('/{bonus_type_slug}/edit', [BonusTypeController::class, 'edit'])->name('edit');
        Route::patch('/{bonus_type_slug}', [BonusTypeController::class, 'update'])->name('update');
        Route::delete('/{bonus_type_slug}', [BonusTypeController::class, 'destroy'])->name('destroy');
    });
    Route::name('softs.')->prefix('softs')->group(function () {
        Route::get('/', [SoftController::class, 'index'])->name('index');
        Route::get('/search',  [SoftController::class, 'search'])->name('search');
        Route::get('/create', [SoftController::class, 'create'])->name('create');
        Route::post('/store', [SoftController::class, 'store'])->name('store');
        Route::get('/{soft_slug}', [SoftController::class, 'show'])->name('show');
        Route::get('/{soft_slug}/edit', [SoftController::class, 'edit'])->name('edit');
        Route::patch('/{soft_slug}', [SoftController::class, 'update'])->name('update');
        Route::delete('/{soft_slug}', [SoftController::class, 'destroy'])->name('destroy');
    });
    Route::name('licenses.')->prefix('licenses')->group(function () {
        Route::get('/', [LicensesOrgsController::class, 'index'])->name('index');
        Route::get('/search',  [LicensesOrgsController::class, 'search'])->name('search');
        Route::get('/create', [LicensesOrgsController::class, 'create'])->name('create');
        Route::post('/store', [LicensesOrgsController::class, 'store'])->name('store');
        Route::get('/{licens}', [LicensesOrgsController::class, 'show'])->name('show');
        Route::get('/{licens}/edit', [LicensesOrgsController::class, 'edit'])->name('edit');
        Route::patch('/{licens}', [LicensesOrgsController::class, 'update'])->name('update');
        Route::delete('/{licens}', [LicensesOrgsController::class, 'destroy'])->name('destroy');
    });
    Route::name('certificates.')->prefix('certificates')->group(function () {
        Route::get('/', [CertificatesOrgsController::class, 'index'])->name('index');
        Route::get('/search',  [CertificatesOrgsController::class, 'search'])->name('search');
        Route::get('/create', [CertificatesOrgsController::class, 'create'])->name('create');
        Route::post('/store', [CertificatesOrgsController::class, 'store'])->name('store');
        Route::get('/{certificat}', [CertificatesOrgsController::class, 'show'])->name('show');
        Route::get('/{certificat}/edit', [CertificatesOrgsController::class, 'edit'])->name('edit');
        Route::patch('/{certificat}', [CertificatesOrgsController::class, 'update'])->name('update');
        Route::delete('/{certificat}', [CertificatesOrgsController::class, 'destroy'])->name('destroy');
    });
        Route::name('games.')->prefix('games')->group(function () {
        Route::get('/', [GameController::class, 'index'])->name('index');
        Route::get('/search',  [GameController::class, 'search'])->name('search');
        Route::get('/create', [GameController::class, 'create'])->name('create');
        Route::post('/store', [GameController::class, 'store'])->name('store');
        Route::get('/{game_slug}', [GameController::class, 'show'])->name('show');
        Route::get('/{game_slug}/edit', [GameController::class, 'edit'])->name('edit');
        Route::patch('/{game_slug}', [GameController::class, 'update'])->name('update');
        Route::delete('/{game_slug}', [GameController::class, 'destroy'])->name('destroy');
    });

});

Auth::routes();
