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
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard'),
    //Route::get('categories/{id}/create', 'CategoriesController@create')->name('categories.create'),
]);


Route::get('/home', 'HomeController@index')->name('home');
//    Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);
//Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);

