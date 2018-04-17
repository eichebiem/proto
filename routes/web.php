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
// !.settings