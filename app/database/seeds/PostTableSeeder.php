<?php

class PostTableSeeder extends Seeder{

	public function run()
	{
		DB::table('posts')->truncate();
		foreach(range(1,10) as $index){
			Post::create(
				[
				'title' =>'My Post Title'.($index),
				'content' =>'My Post content'.$index
				]);
		}
	}
}