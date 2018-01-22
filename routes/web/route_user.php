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

Route::resource('/users', 'UsersController', [
    'name' => [
        'index' => 'users.index',
        'create' => 'users.create',
        'edit' => 'users.edit',
        'show' => 'users.show',
    ]
]);