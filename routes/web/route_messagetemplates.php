<?php
//Route::get('/leads/create', 'LeadsController@create')->name('leads.create');
//Route::post('/admin/leads/create', 'LeadsController@store')->name('leads.store');
//Route::get('/admin/leads/{id}/edit', 'LeadsController@edit')->name('leads.edit');
//Route::patch('/admin/leads/{id}/update', 'LeadsController@update')->name('leads.update');
//Route::delete('/admin/leads/delete/{id}', 'LeadsController@destroy')->name('leads.destroy');
//Route::get('/admin/leads/{id}', 'LeadsController@show')->name('leads.show');
Route::get('/admin/messagetemplates', 'MessageTemplatesController@index')->name('messagetemplates.index');
Route::get('/admin/send-mail', 'MessageTemplatesController@sendmail')->name('messagetemplates.sendmail');