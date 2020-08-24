<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Storage;
 
// Route::get('/photo_activity/{file}', function ($file){
//     return Storage::response("photo_activity/$file");
// })->name('photo');

Route::get('/','Auth\AuthUserController@index');
Route::post('/', 'Auth\AuthUserController@login')->name('login');
Route::get('password/reset','Auth\AuthUserController@reset')->name('reset.password');
Route::post('password/reset', 'Auth\AuthUserController@resetPassword')->name('reset.password');
Route::post('password/email', 'ForgotPasswordController@forgot')->name('password.reset');
Route::view('forgot_password', 'auth.reset_password')->name('password.reset');

Route::middleware('user')->group(function () {
  Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

  Route::resource('activity', 'ActivityController');
  Route::get('activity/{activity_id}/content/create', 'ContentController@create')->name('content.create');
  Route::get('activity/{activity_id}/content/{id}/edit', 'ContentController@edit')->name('content.edit');
  Route::put('activity/{activity_id}/content/{id}/edit', 'ContentController@update')->name('content.update');
  Route::get('activity/{activity_id}/content/{id}','ContentController@show')->name('content.show');
  Route::post('activity/{activity_id}/content','ContentController@store')->name('content.store');
  Route::resource('user', 'UserController');
  Route::put('user/{id}/email','UserController@updateEmail')->name('user.email');
  Route::get('profile','UserController@profile')->name('user.profile');
  Route::get('user/{user}','UserController@show')->name('user.show');

  Route::resource('calendar', 'CalendarController');
  Route::resource('assignment', 'AssignmentController');
  Route::resource('attention', 'AttentionController');

  Route::get('activity/{activity_id}/content/{content_id}/item/create','ItemController@create')->name('item.create');
  Route::post('activity/{activity_id}/content/{content_id}/item','ItemController@store')->name('item.store');




  Route::get('webapp', 'WebAppController@index');
});

Route::get('demo', function () { return view('template.text'); });
Route::post('demo','WebAppController@store');

