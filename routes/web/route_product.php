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
Route::resource('products', 'ProductsController', [
    'name' => [
        'index' => 'products.index',
        'create' => 'products.create',
        'show' => 'products.show',
        'edit' => 'products.edit',
    ]
]);