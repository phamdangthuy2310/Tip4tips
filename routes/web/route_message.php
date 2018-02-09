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
Route::get('messages/trash', 'MessagesController@trash')->name('messages.trash');
Route::get('messages/sent', 'MessagesController@sent')->name('messages.sent');
Route::get('/messages', 'MessagesController@index')->name('messages.index');
Route::get('/messages/create', 'MessagesController@create')->name('messages.create');
Route::post('/messages/create', 'MessagesController@store')->name('messages.store');
Route::get('/messages/{id}/edit', 'MessagesController@edit')->name('messages.edit');
Route::patch('/messages/{id}/update', 'MessagesController@update')->name('messages.update');
Route::delete('/messages/delete/{id}', 'MessagesController@destroy')->name('messages.destroy');
Route::get('/messages/{id}', 'MessagesController@show')->name('messages.show');

Route::resource('messages', 'MessagesController', [
    'name' => [
        'index' => 'messages.index',
        'create' => 'messages.create',
        'edit' => 'messages.edit',
        'show' => 'messages.show',
        'sent' => 'messages.sent',
    ]
]);