<?php

// sessions
Route::get('/', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
// !.sessions

Route::get('/home', 'DashboardController@show');

// subjects
Route::get('/subjects/create', 'SubjectsController@create');
Route::post('/subjects/create', 'SubjectsController@store');

Route::get('/subjects', 'SubjectsController@index');
// !.subjects

// academic year
Route::get('/acadyear', 'AcadYearController@index');
Route::post('/acadyear', 'AcadYearController@store');
Route::patch('/acadyear/{acadyear}', 'AcadYearController@update');
// !.academic year

// reminders
Route::get('/reminders/create', 'RemindersController@create');
Route::post('/reminders/create', 'RemindersController@store');

Route::get('/reminders', 'RemindersController@index');
Route::get('/reminders/{reminder}', 'RemindersController@edit');
Route::patch('/reminders/{reminder}', 'RemindersController@update');
Route::post('/reminders/{reminder}', 'RemindersController@delete');

Route::post('/reminders/update_active/{reminder}', 'RemindersController@update_active');
Route::post('/reminders/update_inactive/{reminder}', 'RemindersController@update_inactive');

// !.reminders

// settings
Route::get('/settings/room', 'RoomsController@index');
Route::post('/settings/room', 'RoomsController@store');
Route::get('/settings/room/{room}', 'RoomsController@edit');
Route::patch('/settings/room/{room}', 'RoomsController@update');
Route::post('/settings/room/{room}', 'RoomsController@delete');

Route::get('/settings/program', 'ProgramsController@index');
Route::post('/settings/program', 'ProgramsController@store');
Route::get('/settings/program/{program}', 'ProgramsController@edit');
Route::patch('/settings/program/{program}', 'ProgramsController@update');
Route::post('/settings/program/{program}', 'ProgramsController@delete');

Route::get('/settings/curriculum', 'CurrController@index');
Route::post('/settings/curriculum', 'CurrController@store');
Route::get('/settings/curriculum/{curriculum}', 'CurrController@edit');
Route::patch('/settings/curriculum/{curriculum}', 'CurrController@update');
Route::post('/settings/curriculum/{curriculum}', 'CurrController@delete');
// !.settings

