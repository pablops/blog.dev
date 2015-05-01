@extends('layouts.master')

@section('content')
	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach	
		{{ Form::open(array('action' => array('PostsController@update', $post->id),				   'method' => 'put')) }}
		<br>
		{{ Form::token() }}
		<h1>edit form</h1>
		<label>this is a label</label>
		<input type="text" name="title" value="{{{ $post->title }}}"><br>
		<label>this is text</label>
		<input type="text" name="body" value="{{{ $post->body }}}"><br>
		<input type="submit" value="Submit" />
	</form>
	
	
@stop