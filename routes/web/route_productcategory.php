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
Route::get('/admin/productcategories', 'ProductCategoriesController@index')->name('productcategories.index');
Route::get('/admin/productcategories/create', 'ProductCategoriesController@create')->name('productcategories.create');
Route::post('/admin/productcategories/create', 'ProductCategoriesController@store')->name('productcategories.store');
Route::get('/admin/productcategories/{id}/edit', 'ProductCategoriesController@edit')->name('productcategories.edit');
Route::patch('/admin/productcategories/{id}/update', 'ProductCategoriesController@update')->name('productcategories.update');
Route::delete('/admin/productcategories/delete/{id}', 'ProductCategoriesController@destroy')->name('productcategories.destroy');
Route::get('/admin/productcategories/{id}', 'ProductCategoriesController@show')->name('productcategories.show');

Route::resource('productcategories', 'ProductCategoriesController',
    ['names' => [
        'index' => 'productcategories.index',
        'create' => 'productcategories.create',
        'store' => 'productcategories.store',
        'edit' => 'productcategories.edit',
        'update' => 'productcategories.update'
    ]]);