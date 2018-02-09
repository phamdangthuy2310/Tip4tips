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
Route::post('/gifts/ajaxAddCategory', 'GiftsController@ajaxAddCategory')->name('gifts.addcategory');
Route::get('/gifts', 'GiftsController@index')->name('gifts.index');
Route::get('/gifts/create', 'GiftsController@create')->name('gifts.create');
Route::post('/gifts/create', 'GiftsController@store')->name('gifts.store');
Route::get('/gifts/{id}/edit', 'GiftsController@edit')->name('gifts.edit');
Route::patch('/gifts/{id}/update', 'GiftsController@update')->name('gifts.update');
Route::delete('/gifts/delete/{id}', 'GiftsController@destroy')->name('gifts.destroy');
Route::get('/gifts/{id}', 'GiftsController@show')->name('gifts.show');
//Route::resource('gifts', 'GiftsController', [
//    'name' => [
//        'index' => 'gifts.index',
//        'create' => 'gifts.create',
//        'edit' => 'gifts.edit',
//        'show' => 'gifts.show',
//    ]
//]);