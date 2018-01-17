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
Route::resource('giftcategories', 'GiftCategoriesController',
    ['names' => [
        'index' => 'giftcategories.index',
        'create' => 'giftcategories.create'
    ]]);