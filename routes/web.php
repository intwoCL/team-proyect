<?php

use Illuminate\Support\Facades\Route;

Route::get('sign_in/android/','Auth\AuthUserController@android')->name('index.app');

Route::get('/','Auth\AuthUserController@index')->name('index');
Route::post('/','Auth\AuthUserController@login')->name('login');
Route::get('password/reset','Auth\AuthUserController@reset')->name('reset.password');
Route::post('password/reset','Auth\AuthUserController@resetPassword')->name('reset.password');
Route::get('about','DashboardController@about')->name('about');


Route::middleware('user')->group(function () {

  Route::get('sign-out', 'Auth\AuthUserController@logout')->name('logout');

  Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

  Route::resource('activity','ActivityController');
  Route::get('activity/{activity_id}/content/create','ContentController@create')->name('content.create');
  Route::get('activity/{activity_id}/content/{id}/edit','ContentController@edit')->name('content.edit');
  Route::put('activity/{activity_id}/content/{id}/edit','ContentController@update')->name('content.update');
  Route::get('activity/{activity_id}/content/{id}','ContentController@show')->name('content.show');
  Route::post('activity/{activity_id}/content','ContentController@store')->name('content.store');
  Route::put('activity/{activity_id}/content','ContentController@changePosition')->name('content.changePosition');
  
  Route::post('activity/{activity_id}/content/{content_id}/item','ItemController@store')->name('item.store');
  Route::put('activity/{activity_id}/content/{content_id}/item','ItemController@changePosition')->name('item.changePosition');
  Route::get('item/{id}/edit','ItemController@edit')->name('item.edit');
  Route::put('item/{id}','ItemController@update')->name('item.update');
  Route::delete('item','ItemController@destroy')->name('item.delete');  

  Route::get('preview/item/{id}','PreviewController@item')->name('preview.item');
  Route::get('preview/content/{id}','PreviewController@content')->name('preview.content');


  Route::resource('user','UserController');
  Route::put('user/{id}/email','UserController@updateEmail')->name('user.email');
  Route::get('profile','UserController@profile')->name('user.profile');
  Route::get('user/{user}','UserController@show')->name('user.show');

  Route::resource('calendar','CalendarController');
  // Route::get('calendar/{id}/details','CalendarActivityController@index')->name('calendar.activity.index');
  Route::get('calendar/{id}/details/edit','CalendarActivityController@edit')->name('calendar.activity.edit');
  Route::get('calendar/{id}/details/{day}/create','CalendarActivityController@create')->name('calendar.activity.create');
  Route::post('calendar/{id}/details/{day}/create','CalendarActivityController@store')->name('calendar.activity.store');

  Route::delete('calendaractivity/delete','CalendarActivityController@delete')->name('calendar.activity.delete');
  //Create 2 CalenadarActivity
  Route::get('calendar/{id}/details/create2','CalendarActivityController@create2')->name('calendar.activity.create2');
  Route::post('calendar/{id}/details/create2','CalendarActivityController@store2')->name('calendar.activity.store2');

  Route::resource('assignment','AssignmentController',['except'=>['destroy']]);
  Route::delete('assignment','AssignmentController@delete')->name('assignment.delete');
  Route::resource('enrollment','EnrollmentController');
  Route::get('schedule/user/{user_id}','ScheduleController@index')->name('schedule.index');
  Route::get('schedule/user/{user_id}/create','ScheduleController@create')->name('schedule.create');
  Route::post('schedule/user/{user_id}/create','ScheduleController@store')->name('schedule.store');

  Route::get('schedule/{id}/edit','ScheduleController@edit')->name('schedule.edit');
  Route::put('schedule/{id}/edit','ScheduleController@update')->name('schedule.update');

  Route::get('schedule/{id}/details','ScheduleController@show')->name('schedule.show');
  Route::get('schedule/{id}/details/edit','ScheduleController@details')->name('schedule.details.edit');
  Route::get('schedule/{id}/details/create','ScheduleActivityController@create')->name('schedule.activity.create');
  Route::delete('schedule/activity/delete','ScheduleActivityController@delete')->name('schedule.activity.delete');
  Route::post('schedule/activity/store','ScheduleActivityController@store')->name('schedule.activity.store');

  



  Route::resource('attention','AttentionController',['except'=>['show']]);
  // Route::get('attention/create', 'AttentionController@create')->name('attention.create');
  Route::get('attention/assigned','AttentionController@assigned')->name('attention.assigned');
  Route::get('attention/{user_id}/create','AttentionController@create')->name('attention.create');
  Route::get('attention/{user_id}','AttentionController@show')->name('attention.control');
  Route::get('attention/{user_id}/historial', 'AttentionController@historial')->name('attention.historial');
  // Route::put('attention/{attention}','AttentionController@update')->name('attention.update');

  Route::namespace('App')->prefix('webapp')->group(function () {
    Route::get('/','WebAppController@index')->name('app.index');
    
    Route::get('activity/{id}','WebAppController@activity')->name('app.activity');
    Route::get('content/{id}','WebAppController@content')->name('app.content');

    Route::get('calendar/{month}/{year}','WebAppController@calendar')->name('app.calendar');
    Route::post('calendar','WebAppController@findCalendar')->name('app.findCalendar');
    Route::get('profile','WebAppController@profile')->name('app.profile');    
  });

});


// Route::get('app','WebAppController@index')->name('app');


Route::get('demo', function () { return view('template.text'); });
Route::post('demo','WebAppController@store');
Route::get('mail','MailController@sendEmail');

// Route::get('/debug-sentry', function () {
//   throw new Exception('My first Sentry error!');
// });


