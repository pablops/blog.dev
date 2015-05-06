@extends('layouts.master')

@section('content')
	<form method="post" action="{{ action('HomeController@doLogin') }}">
		<br>
		<label for='email'>email</label><br>
		<input type="text" name="email" autofocus>
		<br>
		<label for='password'>password</label><br>
		<input type="password" name="password"><br>
		<br>
		<input type='hidden' value='{{{ csrf_token() }}}' name="_token">
		<button action="submit" name="login" value="login">log in</button>
	</form>
@stop