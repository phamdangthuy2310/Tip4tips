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

Route::get('/admin/messages/trash', 'MessagesController@trash')->name('messages.trash');
Route::get('/admin/messages/trash/{id}', 'MessagesController@showMessageTrack')->name('messages.showtrack');
Route::get('/admin/messages/sent', 'MessagesController@sent')->name('messages.sent');
Route::get('/admin/messages/sent/{id}', 'MessagesController@showMessageSent')->name('messages.showsent');
Route::get('/admin/messages', 'MessagesController@index')->name('messages.index');
Route::get('/admin/messages/create', 'MessagesController@create')->name('messages.create');
Route::post('/admin/messages/create', 'MessagesController@store')->name('messages.store');
Route::get('/admin/messages/{id}/edit', 'MessagesController@edit')->name('messages.edit');
Route::patch('/admin/messages/{id}/update', 'MessagesController@update')->name('messages.update');
Route::delete('/admin/messages/deletetrash/{id}', 'MessagesController@deleteMessageTrash')->name('messages.deletetrash');
Route::delete('/admin/messages/deletesent/{id}', 'MessagesController@deleteMessageSent')->name('messages.deletesent');
Route::delete('/admin/messages/delete/{id}', 'MessagesController@destroy')->name('messages.destroy');
Route::get('/admin/messages/{id}', 'MessagesController@show')->name('messages.show');

//Route::resource('messages', 'MessagesController', [
//    'name' => [
//        'index' => 'messages.index',
//        'create' => 'messages.create',
//        'edit' => 'messages.edit',
//        'show' => 'messages.show',
//        'sent' => 'messages.sent',
//    ]
//]);