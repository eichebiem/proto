<?php

// sessions
Route::get('/', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
// !.sessions

Route::get('/home', 'DashboardController@show');

// settings
Route::get('/settings/room', 'RoomController@index');
Route::post('/settings/room', 'RoomController@store');

Route::get('/settings/level', 'LevelController@index');
Route::post('/settings/level', 'LevelController@store');

Route::get('/settings/curriculum', 'CurrController@index');
Route::post('/settings/curriculum', 'CurrController@store');
// !.settings

