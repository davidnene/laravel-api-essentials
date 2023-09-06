<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryControl;
use App\Http\Controllers\FileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('country', 'App\Http\Controllers\country\CountryController@country');
// Route::get('country', [CountryController::class, 'country']);
// Route::get('country/{id}', [CountryController::class, 'countryByID']);
// Route::post('country', [CountryController::class, 'countrySave']);
// Route::put('country/{id}', [CountryController::class, 'countryUpdate']);
// Route::patch('country/{id}', [CountryController::class, 'countryUpdate']);
// Route::delete('country/{id}', [CountryController::class, 'countryDelete']);


Route::group(['middleware' => 'auth:api'], function() {
});

Route::apiResource('country', CountryControl::class, [
    'only' => ['index', 'show', 'store', 'update', 'destroy'],
   ]);
Route::get('file/country_list', [FileController::class, 'countryList']);