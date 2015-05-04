@extends ('layouts.master')

@section('content')

	<div>
		@foreach($posts as $post)
			<h2><a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a></h2>
			<a href="{{{ action('PostsController@edit', $post->id) }}}">edit</a>
			<p class="post-text">{{{ $post->body }}}</p>
			<p>{{{ $post->created_at->setTimezone('America/Chicago')->format('F jS Y, h:i A') }}}</p>
			<p>+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
			+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-++-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+</p>
		@endforeach
	</div>	

	<div class="pagination">
		{{ $posts->links() }}
	</div>
	
@stop