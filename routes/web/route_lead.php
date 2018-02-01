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
Route::post('/leads/updatePointAjax', 'TipstersController@updatePointAjax')->name('tipsters.updatePointAjax');
Route::get('/leads/updateStatus', 'LeadsController@updateStatus')->name('leads.updateStatus');
Route::get('/leads/updateTipster', 'LeadsController@updateTipster')->name('leads.updateTipster');
Route::post('/leads/ajaxStatus', 'LeadsController@ajaxStatus')->name('leads.ajaxStatus');
//Route::get('leads/ajaxStatus', 'LeadsController@ajaxStatus')->name('leads.ajaxStatus');
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