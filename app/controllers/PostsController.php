<?php

class PostsController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->beforeFilter('auth', ['except' => ['index', 'show', 'showLogin']]);
		parent::__construct();
	}

	public function index()
	{
		$query  = Post::with('user');
		
		if(Input::has('search')){
			$search = Input::get('search');
			$query->where('title', 'like', '%' . $search . '%');
		}
			$post = $query->orderBy('created_at', 'DESC')->paginate(10);
			return View::make('posts.index')->with(['posts'=> $post]);

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$validator = Validator::make(Input::all(), Post::$rules);

		if($validator->fails()){
			Log::info('There is an error.');
			return Redirect::to('posts/create')->withInput()->withErrors($validator);
		} else{
			$post        = new Post;
			$post->title = Input::get('title');
			$post->body  = Input::get('body');
			$post->slug  = Input::get('title');
			$post->save();
			return Redirect::action('PostsController@index');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = null;
		
		if(is_numeric($id)){
			$post = Post::findOrFail($id);
		} else {
			$slug = $id;
			$post = Post::where('slug', $slug)->first();
		}

		if(!$post){
			Session::flash('errorMessage', 'error with post');
			App::abort(404);
		}
		
		$data = ['post' => $post];
		return View::make('posts.show')->with($data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$post = Post::findOrFail($id);
			$data = ['post' => $post];
			return View::make('posts.edit')->with($data);
		} catch(Exception $e) {
			$data = ['error' => $e->getMessage()];
			Session::flash('errorMessage', 'error with post');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			$post        = Post::findOrFail($id);
			$post->title = Input::get('title');
			$post->body  = Input::get('body');
			$post->save();
			Session::flash('successMessage', 'Post successfully updated.');
			return Redirect::action('PostsController@show', $id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();

		Session::flash('successMessage', 'Post successfully deleted.');

		return Redirect::action('PostsController@index');
	}


}
