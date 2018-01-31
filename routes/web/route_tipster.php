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
Route::resource('/tipsters', 'TipstersController', [
    'name' => [
        'index' => 'tipsters.index',
        'create' => 'tipsters.create',
        'edit' => 'tipsters.edit',
        'show' => 'tipsters.show',
    ]
]);
