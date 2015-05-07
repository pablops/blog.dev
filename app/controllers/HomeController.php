<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct()
	{
		// $this->beforeFilter('auth', ['except' => ['index', 'show', 'showLogin']]);
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showPubs()
	{
		return View::make('pubs');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}	

	public function showMain()
	{
		return View::make('main');
	}

	public function showEmail()
	{
		return View::make('email');
	}

	// get route
	public function login()
	{
		return View::make('login-form');
	}

	// post route
	public function doLogin()
	{
		$email    = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    		Session::flash('successMessage', 'User logged in.');
    		return Redirect::intended('/');
		} else {
    		// login failed, go back to the login screen
    		Session::flash('errorMessage', 'Login failed.');
    		return Redirect::back()->withInput();

		}
	}
	// get route
	public function logout()
	{
		Auth::logout();
		return View::make('login-form');
	}

	public function showLogin()
	{
		return View::make('login-form');
	}



}
