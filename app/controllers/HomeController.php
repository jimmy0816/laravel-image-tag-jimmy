<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    protected $layout = 'layout';

	public function index()
	{
	$posts = Post::all();

	 $this->layout->content = View::make('posts.home')->with('posts',$posts);
	// return View::make('posts.home')->with('posts',$posts);
	// return View::make('layout')->with('posts',$posts);
	}	

	public function show($id)
	{
	$post = Post::find($id);

	return View::make('posts.show')->with('post',$post);
	}

}
