<?php

use Illuminate\Http\Request;
use App\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*========================
 * API for TIPSTER
 *======================== */
Route::get('/tipsters', 'Api\TipstersAPIController@index');
Route::get('/tipsters/{id}', 'Api\TipstersAPIController@show');
Route::post('/tipsters/', 'Api\TipstersAPIController@store');
Route::patch('/tipsters/{id}', 'Api\TipstersAPIController@update');
Route::delete('/tipsters/{id}', 'Api\TipstersAPIController@destroy');
/*========================
 * API for LEAD
 *======================== */
Route::get('/leads', 'Api\LeadsAPIController@index');
Route::get('/leads/{id}', 'Api\LeadsAPIController@show');
Route::post('/leads/', 'Api\LeadsAPIController@store');
Route::patch('/leads/{id}', 'Api\LeadsAPIController@update');
Route::delete('/leads/{id}', 'Api\LeadsAPIController@destroy');
/*========================
 * API for GIFT
 *======================== */
Route::get('/gifts', 'Api\GiftsAPIController@index');
Route::get('/gifts/{id}', 'Api\GiftsAPIController@show');
//Route::post('/gifts/', 'Api\GiftsAPIController@store');
//Route::patch('/gifts/{id}', 'Api\GiftsAPIController@update');
//Route::delete('/gifts/{id}', 'Api\GiftsAPIController@destroy');

