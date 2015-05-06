<html>
<head>
	<title>Laravel Blog</title>
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<div class='div-links'>
			<a href="http://blog.dev/main"><i class="fa fa-home"></i></a>
			/
			<a href="http://twitter.com"><i class="fa fa-twitter"></i></a>
			/	
			<a href="https://github.com/pablops"><i class="fa fa-github-alt"></i></a>	
			/
			<a href="{{{ action('HomeController@showEmail') }}}"><i class="fa fa-envelope"></i></a>	
			/
			<a href="{{{ action('HomeController@showPortfolio') }}}"> portfolio</a>
			/
			<a href="{{{ action('HomeController@showPubs') }}}">publications</a>
			@if(Auth::check())
			/
			<a href="/logout">logout</a>
			@endif
		</div>	
		<div>
			@if(Auth::check())
			<pre> {{ Auth::user()->email }} </pre>
			@endif
		</div>
		@if (Session::has('successMessage'))
		    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
		@endif
		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
		@endif
	</header>
		@yield('content')
	<footer>
		<div id='footer-content'>
			©<?= date('Y'); ?>
		</div>
	</footer>
</body>
</html>