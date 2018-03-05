<?php
Route::get('/admin/activities','LogActivitiesController@index')->name('activities.index');
Route::delete('/admin/activities/delete/{id}','LogActivitiesController@destroy')->name('activities.destroy');