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
Route::get('/admin/giftcategories', 'GiftCategoriesController@index')->name('giftcategories.index');
Route::get('/admin/giftcategories/create', 'GiftCategoriesController@create')->name('giftcategories.create');
Route::post('/admin/giftcategories/create', 'GiftCategoriesController@store')->name('giftcategories.store');
Route::get('/admin/giftcategories/{id}/edit', 'GiftCategoriesController@edit')->name('giftcategories.edit');
Route::patch('/admin/giftcategories/{id}/update', 'GiftCategoriesController@update')->name('giftcategories.update');
Route::delete('/admin/giftcategories/delete/{id}', 'GiftCategoriesController@destroy')->name('giftcategories.destroy');
Route::get('/admin/giftcategories/{id}', 'GiftCategoriesController@show')->name('giftcategories.show');
