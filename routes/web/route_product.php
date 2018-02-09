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
Route::post('/products/ajaxAddCategory', 'ProductsController@ajaxAddCategory')->name('products.addcategory');
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/create', 'ProductsController@create')->name('products.create');
Route::post('/products/create', 'ProductsController@store')->name('products.store');
Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');
Route::patch('/products/{id}/update', 'ProductsController@update')->name('products.update');
Route::delete('/products/delete/{id}', 'ProductsController@destroy')->name('products.destroy');
Route::get('/products/{id}', 'ProductsController@show')->name('products.show');
//Route::resource('products', 'ProductsController', [
//    'name' => [
//        'index' => 'products.index',
//        'create' => 'products.create',
//        'show' => 'products.show',
//        'edit' => 'products.edit',
//    ]
//]);