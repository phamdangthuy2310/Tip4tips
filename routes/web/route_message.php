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
Route::resource('messages', 'MessagesController', [
    'name' => [
        'index' => 'messages.index',
        'create' => 'messages.create',
        'edit' => 'messages.edit',
        'show' => 'messages.show',
        'sent' => 'messages.sent',
    ]
]);