<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'IndexController@index');
Route::get('/calendar/me', 'CalendarController@me');
Route::get('/calendar/{user_code}', 'CalendarController@show');
Route::get('/edit', 'EditController@index');
Route::post('/edit', 'EditController@post');

Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@post');
Route::get('/withdraw', 'WithdrawController@index');
Route::post('/withdraw', 'WithdrawController@post');
Route::get('/inquiry', 'InquiryController@index');
Route::post('/inquiry', 'InquiryController@post');

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
Route::get('logout', 'Auth\LogoutController@index');

Route::get('/page/howto', 'PageController@howto');
Route::get('/page/termsofservice', 'PageController@termsofservice');

Route::post('/api/calendar/schedule', 'Api\CalendarScheduleController@post');
