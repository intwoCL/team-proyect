<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Auth\AuthUserController@index');
Route::post('/', 'Auth\AuthUserController@login')->name('login');

Route::middleware('user')->group(function () {
  Route::resource('activity', 'ActivityController');
  

});