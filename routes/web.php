<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('layouts.login'); });
Route::post('/', 'Auth\AuthUserController@login')->name('login');


Route::middleware('user')->group(function () {

});