@extends ('layouts.master')

@section('content')

	<div>
		@foreach($posts as $post)
			<h2>{{{ $post->title }}}</h2>
			<p class="post-text">{{{ $post->body }}}</p>
			<p>+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
			+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-++-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+</p>
		@endforeach
	</div>	

	<div class="pagination">
		{{ $posts->links() }}
	</div>
	
@stop