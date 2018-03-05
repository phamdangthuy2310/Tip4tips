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
Route::get('/admin/assignments', 'AssignmentsController@index')->name('assignments.index');
Route::get('/admin/assignments/create', 'AssignmentsController@create')->name('assignments.create');
Route::post('/admin/assignments/create', 'AssignmentsController@store')->name('assignments.store');
Route::get('/admin/assignments/{id}/edit', 'AssignmentsController@edit')->name('assignments.edit');
Route::patch('/admin/assignments/{id}/update', 'AssignmentsController@update')->name('assignments.update');
Route::delete('/admin/assignments/delete/{id}', 'AssignmentsController@destroy')->name('assignments.destroy');
Route::get('/admin/assignments/{id}', 'AssignmentsController@show')->name('assignments.show');
//Route::resource('assignments', 'AssignmentsController', [
//    'name' => [
//        'index' => 'assignments.index',
//        'create' => 'assignments.create',
//        'show' => 'assignments.show',
//        'edit' => 'assignments.edit',
//    ]
//]);