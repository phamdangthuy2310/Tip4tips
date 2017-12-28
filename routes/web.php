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
Route::get('/admin', function () {
    return view('admin.home');
});
Route::get('/managers', function () {
    return view('managers.index');
});
Route::get('/managers/add', function () {
    return view('managers.create');
});
Route::get('/managers/edit', function () {
    return view('managers.edit');
});
Route::get('/managers/show', function () {
    return view('managers.show');
});

Route::get('/consultants/', function () {
    return view('consultants.index');
});
Route::get('/consultants/edit', function () {
    return view('consultants.edit');
});
Route::get('/consultants/add', function () {
    return view('consultants.create');
});

Route::get('/mail', function () {
    return view('mail.mailbox');
});
Route::get('/mail/read', function () {
    return view('mail.readmail');
});
Route::get('/mail/compose', function () {
    return view('mail.compose');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
