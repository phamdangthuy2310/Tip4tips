<?php
Route::get('/activities','LogActivitiesController@index')->name('activities.index');
Route::delete('/activities/delete/{id}','LogActivitiesController@destroy')->name('activities.destroy');