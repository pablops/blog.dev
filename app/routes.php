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

Route::get('/logout', 'HomeController@logout');

Route::resource('posts', 'PostsController');


Route::get('orm-test', function()
{
	$query  = Post::with('user');

	$search = 'pablo';

	$query->where('title', 'like', '%' . $search . '%');
	$query->orWhere('body', 'like', '%' . $search . '%');

	$query->orWhereHas('user', function($q){
		$q->where('email', 'like', '%pablo%');
	});

	$post = $query->orderBy('created_at', 'DESC')->paginate(10);

	dd($post);

});



