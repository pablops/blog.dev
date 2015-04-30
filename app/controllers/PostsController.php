<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('posts.index')->with(['posts'=>Post::all()]);
		// $posts = Post::all();
		// return View::make('posts.index')->with(['post' => $posts]);
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
			return Redirect::to('posts/create')->withInput()->withErrors($validator);
		} else{
			$post        = new Post;
			$post->title = Input::get('title');
			$post->body  = Input::get('body');
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
		try{
			$post = Post::findOrFail($id);
			$data = ['post' => $post];
			return View::make('posts.show')->with($data);
		} catch(Exception $e) {
			$data = ['error' => $e->getMessage()];
			// return View::make('errors.exception')->with($data);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "edit edit edit";
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "update";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "destroy";
	}


}
