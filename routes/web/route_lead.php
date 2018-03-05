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
Route::get('/admin/leads/updateStatus', 'LeadsController@updateStatus')->name('leads.updateStatus');
Route::get('/admin/leads/updateTipster', 'LeadsController@updateTipster')->name('leads.updateTipster');
Route::post('/admin/leads/ajaxStatus', 'LeadsController@ajaxStatus')->name('leads.ajaxStatus');


Route::get('/admin/leads/create', 'LeadsController@create')->name('leads.create');
Route::post('/admin/leads/create', 'LeadsController@store')->name('leads.store');
Route::get('/admin/leads/{id}/edit', 'LeadsController@edit')->name('leads.edit');
Route::patch('/admin/leads/{id}/update', 'LeadsController@update')->name('leads.update');
Route::delete('/admin/leads/delete/{id}', 'LeadsController@destroy')->name('leads.destroy');
Route::get('/admin/leads/{id}', 'LeadsController@show')->name('leads.show');
Route::get('/admin/leads', 'LeadsController@index')->name('leads.index');
//Route::resource('leads', 'LeadsController',[
//    'name' => [
//        'index' => 'leads.index',
//        'create' => 'leads.create',
//        'edit' => 'leads.edit',
//        'show' => 'leads.show',
//    ]
//]);

Route::resource('leadsprocesses', 'LeadProcessesController',[
    'name' => [
        'index' => 'leadsprocesses.index',
        'create' => 'leadsprocesses.create',
        'edit' => 'leadsprocesses.edit',
        'store' => 'leadsprocesses.store',
        'show' => 'leadsprocesses.show',
    ]
]);