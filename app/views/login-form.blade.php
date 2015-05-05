@extends('layouts.master')

@section('content')
	<form action="{{ action('HomeController@doLogin') }}" method="post">
		<br>
		email<br>
		<input type="text" name="email">
		<br>
		password<br>
		<input type="password" name="password"><br>
		<br>
		<input type='hidden' value='{{{ csrf_token() }}}' name="_token">
		<button action="submit" name="login" value="login">log in</button>
	</form>

@stop