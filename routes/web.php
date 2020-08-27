<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Auth\AuthUserController@index');
Route::post('/','Auth\AuthUserController@login')->name('login');
Route::get('password/reset','Auth\AuthUserController@reset')->name('reset.password');
Route::post('password/reset','Auth\AuthUserController@resetPassword')->name('reset.password');

Route::middleware('user')->group(function () {

  Route::get('sign-out', 'Auth\AuthUserController@logout')->name('logout');

  Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

  Route::resource('activity','ActivityController');
  Route::get('activity/{activity_id}/content/create','ContentController@create')->name('content.create');
  Route::get('activity/{activity_id}/content/{id}/edit','ContentController@edit')->name('content.edit');
  Route::put('activity/{activity_id}/content/{id}/edit','ContentController@update')->name('content.update');
  Route::get('activity/{activity_id}/content/{id}','ContentController@show')->name('content.show');
  Route::post('activity/{activity_id}/content','ContentController@store')->name('content.store');
  Route::resource('user','UserController');
  Route::put('user/{id}/email','UserController@updateEmail')->name('user.email');
  Route::get('profile','UserController@profile')->name('user.profile');
  Route::get('user/{user}','UserController@show')->name('user.show');

  Route::resource('calendar','CalendarController');
  Route::resource('assignment','AssignmentController');

  Route::get('activity/{activity_id}/content/{content_id}/item/create','ItemController@create')->name('item.create');
  Route::get('activity/{activity_id}/content/{content_id}/item/edit/{id}','ItemController@edit')->name('item.edit');
  Route::post('activity/{activity_id}/content/{content_id}/item/{id}','ItemController@update')->name('item.update');
  Route::post('activity/{activity_id}/content/{content_id}/item','ItemController@store')->name('item.store');





  Route::resource('attention','AttentionController',['except'=>['show']]);
  // Route::get('attention/create', 'AttentionController@create')->name('attention.create');
  Route::get('attention/assigned','AttentionController@assigned')->name('attention.assigned');
  Route::get('attention/{user_id}/create','AttentionController@create')->name('attention.create');
  Route::get('attention/{user_id}','AttentionController@show')->name('attention.control');
  Route::get('attention/{user_id}/historial', 'AttentionController@historial')->name('attention.historial');
  
  Route::get('webapp','WebAppController@index')->name('webapp');
  Route::get('webapp/activity','WebAppController@activity')->name('web');
  Route::get('webapp/item','WebAppController@item')->name('item');

});

Route::get('demo', function () { return view('template.text'); });
Route::post('demo','WebAppController@store');
Route::get('mail','MailController@sendEmail');
