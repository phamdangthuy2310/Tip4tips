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
Route::get('/leads/updateStatus', 'LeadsController@updateStatus')->name('leads.updateStatus');
Route::get('/leads/updateTipster', 'LeadsController@updateTipster')->name('leads.updateTipster');
Route::post('/leads/ajaxStatus', 'LeadsController@ajaxStatus')->name('leads.ajaxStatus');

Route::get('/leads', 'LeadsController@index')->name('leads.index');
Route::get('/leads/create', 'LeadsController@create')->name('leads.create');
Route::post('/leads/create', 'LeadsController@store')->name('leads.store');
Route::get('/leads/edit', 'LeadsController@edit')->name('leads.edit');
Route::put('/leads/update', 'LeadsController@update')->name('leads.update');
Route::delete('/leads/delete/{id}', 'LeadsController@destroy')->name('leads.destroy');

Route::resource('leads', 'LeadsController',[
    'name' => [
        'index' => 'leads.index',
        'create' => 'leads.create',
        'edit' => 'leads.edit',
        'show' => 'leads.show',
    ]
]);

Route::resource('leadsprocesses', 'LeadProcessesController',[
    'name' => [
        'index' => 'leadsprocesses.index',
        'create' => 'leadsprocesses.create',
        'edit' => 'leadsprocesses.edit',
        'store' => 'leadsprocesses.store',
        'show' => 'leadsprocesses.show',
    ]
]);