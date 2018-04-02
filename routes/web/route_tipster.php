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
Route::get('/admin/tipsters/{id}/updatePointManual', 'TipstersController@updatePointManual')->name('tipsters.updatePointManual');
Route::get('/admin/tipsters/updatePoint', 'TipstersController@updatePoint')->name('tipsters.updatePoint');
Route::post('/admin/tipsters/updatePointAjax', 'TipstersController@updatePointAjax')->name('tipsters.updatePointAjax');
Route::get('/admin/tipsters', 'TipstersController@index')->name('tipsters.index');
Route::get('/admin/tipsters/create', 'TipstersController@create')->name('tipsters.create');
Route::post('/admin/tipsters/create', 'TipstersController@store')->name('tipsters.store');
Route::get('/admin/tipsters/{id}/edit', 'TipstersController@edit')->name('tipsters.edit');
Route::patch('/admin/tipsters/{id}/update', 'TipstersController@update')->name('tipsters.update');
Route::delete('/admin/tipsters/delete/{id}', 'TipstersController@destroy')->name('tipsters.destroy');
Route::get('/admin/tipsters/{id}', 'TipstersController@show')->name('tipsters.show');
//Route::resource('/tipsters', 'TipstersController', [
//    'name' => [
//        'index' => 'tipsters.index',
//        'create' => 'tipsters.create',
//        'edit' => 'tipsters.edit',
//        'show' => 'tipsters.show',
//    ]
//]);
