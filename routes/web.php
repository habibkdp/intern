<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewsManagement\{ProvinceController, CountryController};
use Illuminate\Support\Facades\{Auth, Route};

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


Auth::routes();

Route::middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Province route
    Route::get('/province', [ProvinceController::class, 'index'])->name('provinceHome');
    Route::get('/province/add', [ProvinceController::class, 'create'])->name('provinceCreate');
    Route::post('/province/add', [ProvinceController::class, 'store'])->name('provinceStore');
    Route::get('/province/edit/{province}', [ProvinceController::class, 'edit'])->name('provinceEdit');
    Route::post('/province/edit/{province}', [ProvinceController::class, 'update'])->name('provinceUpdate');
    Route::get('/province/delete/{province}', [ProvinceController::class, 'destroy'])->name('provinceDestroy');

    // Country route
    Route::get('/country', [CountryController::class, 'index'])->name('countryHome');
    Route::get('/country/add', [CountryController::class, 'create'])->name('countryCreate');
    Route::post('/country/add', [CountryController::class, 'store'])->name('countryStore');
    Route::get('/country/edit/{country}', [CountryController::class, 'edit'])->name('countryEdit');
    Route::post('/country/edit/{country}', [CountryController::class, 'update'])->name('countryUpdate');
    Route::get('/country/delete/{country}', [CountryController::class, 'destroy'])->name('countryDestroy');

    // Dokumentasi API route
    Route::get('docs', [HomeController::class, 'introduction'])->name('introductionAPI');
    Route::get('docs/province', [ProvinceController::class, 'api'])->name('provinceAPI');
    Route::get('docs/country', [CountryController::class, 'api'])->name('countryAPI');
});
