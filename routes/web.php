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
    return redirect()->route('home');
});

Auth::routes([
    Route::get('/admin/dashboard', 'HomeController@dashboard')->name('dashboard'),
]);
Auth::routes([
    Route::get('/admin/', 'HomeController@dashboard')->name('dashboard'),
]);
//change password
Route::get('/changePassword','Auth\ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','Auth\ChangePasswordController@changePassword')->name('changePassword');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

