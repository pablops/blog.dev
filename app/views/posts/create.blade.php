@extends('layouts.master')

@section('content')
	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach	
	<form action="{{{ action('PostsController@store') }}}" method="post">
		<br>
		{{ Form::token() }}
		<h1>create a post</h1>
		<label>this is a label</label>
		<input type="text" name="title" value="{{{ Input::old('title') }}}" autofocus><br>
		<label>this is text</label>
		<textarea type="text" name="body" value="{{{ Input::old('body') }}}"></textarea><br>
		<input type="submit" value="Submit" />
	</form>	
@stop