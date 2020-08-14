<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Auth\AuthUserController@index');
Route::post('/', 'Auth\AuthUserController@login')->name('login');

Route::middleware('user')->group(function () {
  Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
  Route::resource('activity', 'ActivityController');
  Route::resource('user', 'UserController');
  Route::resource('calendar', 'CalendarController');
  Route::resource('assignment', 'AssignmentController');
  
});

Route::get('t', function () {
    return view('template.form');
});