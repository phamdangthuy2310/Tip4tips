<?php
//Route::get('/leads/create', 'LeadsController@create')->name('leads.create');
//Route::post('/admin/leads/create', 'LeadsController@store')->name('leads.store');
//Route::get('/admin/leads/{id}/edit', 'LeadsController@edit')->name('leads.edit');
//Route::patch('/admin/leads/{id}/update', 'LeadsController@update')->name('leads.update');
//Route::delete('/admin/leads/delete/{id}', 'LeadsController@destroy')->name('leads.destroy');
//Route::get('/admin/leads/{id}', 'LeadsController@show')->name('leads.show');
Route::get('/admin/messagetemplates/create', 'MessageTemplatesController@create')->name('messagetemplates.create');
Route::post('/admin/messagetemplates/create', 'MessageTemplatesController@store')->name('messagetemplates.store');
Route::get('/admin/messagetemplates/{id}/edit', 'MessageTemplatesController@edit')->name('messagetemplates.edit');
Route::patch('/admin/messagetemplates/{id}/update', 'MessageTemplatesController@update')->name('messagetemplates.update');
Route::delete('/admin/messagetemplates/delete/{id}', 'MessageTemplatesController@destroy')->name('messagetemplates.destroy');
Route::post('/admin/messagetemplates/{id}/send-mail', 'MessageTemplatesController@sendMail')->name('messagetemplates.sendmail');
Route::get('/admin/messagetemplates/{id}/showsendmessage', 'MessageTemplatesController@showSendMessage')->name('messagetemplates.showsendmessage');
Route::get('/admin/messagetemplates/{id}', 'MessageTemplatesController@show')->name('messagetemplates.show');
Route::get('/admin/messagetemplates', 'MessageTemplatesController@index')->name('messagetemplates.index');