@extends('layouts.master')

@section('content')
	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach	
	<form action="{{{ action('PostsController@store') }}}" method="post">
		<br>
		<h1>test form #1</h1>
		<label>this is a label</label>
		<input type="text" name="title" value="{{{ Input::old('title') }}}"><br>
		<label>this is text</label>
		<input type="text" name="body" value="{{{ Input::old('body') }}}"><br>
		<input type="submit" value="Submit" />
	</form>
	
@stop