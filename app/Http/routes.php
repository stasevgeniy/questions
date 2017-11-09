<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','IndexController@index')->name('index');

Route::get('/show/{id}','IndexController@show')->name('show');
Route::post('/show/{id}','IndexController@newComment')->name('newComment');

Route::get('/register','UserController@register')->name('register');
Route::post('/register', 'UserController@createUser');

Route::get('/enter','UserController@enter')->name('enter');
Route::post('/enter','UserController@postLogin');

Route::get('/exit','UserController@exitUser')->name('exitUser');

Route::get('/new','IndexController@newQuestion')->name('newQuestion');
Route::post('/new','IndexController@sendQuestion')->name('sendQuestion');

Route::get('/show/{id}','IndexController@show')->name('show');

Route::post('/add/{question}/{id}','IndexController@addRate')->name('addRate');
Route::post('/min/{question}/{id}','IndexController@minRate')->name('minRate');