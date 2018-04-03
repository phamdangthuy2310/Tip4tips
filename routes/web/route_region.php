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
Route::get('/admin/regions', 'RegionsController@index')->name('regions.index');
Route::get('/admin/regions/create', 'RegionsController@create')->name('regions.create');
Route::post('/admin/regions/create', 'RegionsController@store')->name('regions.store');
Route::get('/admin/regions/{id}/edit', 'RegionsController@edit')->name('regions.edit');
Route::patch('/admin/regions/{id}/update', 'RegionsController@update')->name('regions.update');
Route::delete('/admin/regions/delete/{id}', 'RegionsController@destroy')->name('regions.destroy');
Route::get('/admin/regions/{id}', 'RegionsController@show')->name('regions.show');
