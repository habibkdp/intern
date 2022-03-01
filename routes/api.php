<?php

use App\Http\Controllers\APIManagement\{ProvinceController, CountryController};
use Illuminate\Support\Facades\Route;

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

// Province route
Route::get('province', [ProvinceController::class, 'index']);
Route::post('province', [ProvinceController::class, 'store']);
Route::get('province/{id}', [ProvinceController::class, 'show']);
Route::put('province/{id}', [ProvinceController::class, 'update']);
Route::delete('province/{id}', [ProvinceController::class, 'destroy']);
Route::get('province/search/{name}', [ProvinceController::class, 'search']);
Route::get('province/regencies/{id}', [ProvinceController::class, 'regencies']);

// Country route
Route::get('country', [CountryController::class, 'index']);
Route::post('country', [CountryController::class, 'store']);
Route::get('country/{id}', [CountryController::class, 'show']);
Route::put('country/{id}', [CountryController::class, 'update']);
Route::delete('country/{id}', [CountryController::class, 'destroy']);
Route::get('country/search/{name}', [CountryController::class, 'search']);
Route::get('country/province/{id}', [CountryController::class, 'province']);
