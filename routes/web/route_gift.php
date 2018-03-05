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
Route::post('/admin/gifts/ajaxAddCategory', 'GiftsController@ajaxAddCategory')->name('gifts.addcategory');
Route::get('/admin/gifts', 'GiftsController@index')->name('gifts.index');
Route::get('/admin/gifts/create', 'GiftsController@create')->name('gifts.create');
Route::post('/admin/gifts/create', 'GiftsController@store')->name('gifts.store');
Route::get('/admin/gifts/{id}/edit', 'GiftsController@edit')->name('gifts.edit');
Route::patch('/admin/gifts/{id}/update', 'GiftsController@update')->name('gifts.update');
Route::delete('/admin/gifts/delete/{id}', 'GiftsController@destroy')->name('gifts.destroy');
Route::get('/admin/gifts/{id}', 'GiftsController@show')->name('gifts.show');
//Route::resource('gifts', 'GiftsController', [
//    'name' => [
//        'index' => 'gifts.index',
//        'create' => 'gifts.create',
//        'edit' => 'gifts.edit',
//        'show' => 'gifts.show',
//    ]
//]);