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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::resource('users', 'UsersController');
Route::resource('leads', 'LeadsController');
Route::resource('products', 'ProductsController');
Route::resource('gifts', 'GiftsController');
Route::resource('categories', 'CategoriesController');
Route::get('messages/trash', 'MessagesController@trash');
Route::resource('messages', 'MessagesController');
Route::resource('assignments', 'AssignmentsController');
