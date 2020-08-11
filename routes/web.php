<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});


Route::middleware('user')->group(function () {

});