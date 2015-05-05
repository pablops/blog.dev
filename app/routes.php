<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/portfolio', 'HomeController@showPortfolio');

Route::get('/pubs', 'HomeController@showPubs');

Route::get('/main', 'HomeController@showMain');

Route::get('/email', 'HomeController@showEmail');

Route::get('/update', 'HomeController@showUpdate');

Route::get('/login-form', 'HomeController@showLogin');

Route::post('/login-form', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@Logout');

Route::resource('posts', 'PostsController');


