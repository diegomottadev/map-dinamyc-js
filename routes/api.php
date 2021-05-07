<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DeparmentController;
use App\Http\Controllers\ProvinceController;
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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Route::get('map', [MapController::class],'index');
Route::resource('addresses', 'MapController',['only'=>['store','edit','update']]);
Route::resource('countries','CountryController',['only'=>['index','show']]);
Route::resource('countries.provinces','ProvinceController',['only'=>['index','show']]);
Route::resource('countries.provinces.departments','DeparmentController',['only'=>['index','show']]);
Route::resource('countries.provinces.departments.cities','CityController',['only'=>['index','show']]);
