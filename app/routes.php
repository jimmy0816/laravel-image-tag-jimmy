<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'posts.index', 'uses'=>'HomeController@index']);
Route::get('post/{id}', ['as' => 'posts.show', 'uses'=>'HomeController@show']);
Route::get('newposts/tags', ['as' => 'newposts.tagList', 'uses'=>'NewpostsController@tagList']);
Route::resource('newposts', 'NewpostsController');

// Route::get('/', function()
// {
// });

// Route::get('posts',function()
// {
// 	$posts = Post::all();

// 	$result = '';
// 	foreach($posts as $index => $post)
// 	{
// 		$result .= ($index+1).' '.$post->title.'<br>';
// 	}
// 	return $result;
// });

// Route::get('post/{id}',function($id)
// {
// });// Adding auth checks for the upload functionality is highly recommended.

// Cabinet routes
Route::get('upload/create', 'UploadController@create');
Route::get('upload/data', 'UploadController@data');
Route::resource( 'upload', 'UploadController',
        array('except' => array('show', 'edit', 'update', 'destroy')));
