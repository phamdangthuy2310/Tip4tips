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
Route::get('/admin/users', 'UsersController@index')->name('users.index');
Route::get('/admin/users/create', 'UsersController@create')->name('users.create');
Route::post('/admin/users/create', 'UsersController@store')->name('users.store');
Route::get('/admin/users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/admin/users/{id}/update', 'UsersController@update')->name('users.update');
Route::delete('/admin/users/delete/{id}', 'UsersController@destroy')->name('users.destroy');
Route::get('/admin/users/{id}', 'UsersController@show')->name('users.show');
//Route::resource('/users', 'UsersController', [
//    'name' => [
//        'index' => 'users.index',
//        'create' => 'users.create',
//        'edit' => 'users.edit',
//        'show' => 'users.show',
//    ]
//]);
