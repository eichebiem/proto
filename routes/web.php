<?php

// sessions
Route::get('/', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
// !.sessions

Route::get('/home', 'DashboardController@show');

// reminders
Route::get('/reminders/create', 'RemindersController@create');
Route::post('/reminders/create', 'RemindersController@store');

Route::get('/reminders', 'RemindersController@index');

// !.reminders

// settings
Route::get('/settings/room', 'RoomsController@index');
Route::post('/settings/room', 'RoomsController@store');

Route::get('/settings/level', 'LevelsController@index');
Route::post('/settings/level', 'LevelsController@store');

Route::get('/settings/curriculum', 'CurrController@index');
Route::post('/settings/curriculum', 'CurrController@store');
// !.settings

