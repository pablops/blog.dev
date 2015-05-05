@extends ('layouts.master')

@section('content')
	<h1> {{{ $post->title }}}</h1>
	<a href="{{{ action('PostsController@edit', $post->slug) }}}">edit post</a>
	<p>  Written by: {{{ $post->user->email }}}</p>
	<p>  {{{ $post->body  }}} </p>
	<p>  {{{ $post->created_at }}} </p>
	{{ Form::open(array('method' => 'delete', 'action' => ['PostsController@destroy', $post->id]
	))}}
	<button type="submit">delete</button>
	{{ Form::close() }}
@stop