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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function() {
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('/handleLogin', ['as' => 'handleLogin', 'uses' => 'AuthController@handleLogin']);
    Route::get('/home', ['middleware' => 'auth', 'as' => 'home', 'uses' => 'UsersController@home']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    Route::resource('users', 'UsersController', ['only' => ['create', 'store']]);
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('kelurahan', 'KelurahanController');
    Route::resource('pasien', 'PasienController');
});
