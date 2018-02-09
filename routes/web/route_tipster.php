<?php

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
Route::get('/tipsters/updatePoint', 'TipstersController@updatePoint')->name('tipsters.updatePoint');
Route::post('/tipsters/updatePointAjax', 'TipstersController@updatePointAjax')->name('tipsters.updatePointAjax');
Route::get('/tipsters', 'TipstersController@index')->name('tipsters.index');
Route::get('/tipsters/create', 'TipstersController@create')->name('tipsters.create');
Route::post('/tipsters/create', 'TipstersController@store')->name('tipsters.store');
Route::get('/tipsters/{id}/edit', 'TipstersController@edit')->name('tipsters.edit');
Route::patch('/tipsters/{id}/update', 'TipstersController@update')->name('tipsters.update');
Route::delete('/tipsters/delete/{id}', 'TipstersController@destroy')->name('tipsters.destroy');
Route::get('/tipsters/{id}', 'TipstersController@show')->name('tipsters.show');
//Route::resource('/tipsters', 'TipstersController', [
//    'name' => [
//        'index' => 'tipsters.index',
//        'create' => 'tipsters.create',
//        'edit' => 'tipsters.edit',
//        'show' => 'tipsters.show',
//    ]
//]);
