<?php

class NewpostsController extends \BaseController {

	/**
	 * Display a listing of newposts
	 *
	 * @return Response
	 */
	public function index()
	{
		$images = Image::all();
		$tags = Tag::all();
		// $imagesTag = ImagesTagsMap::find($images->id);
		// echo "<pre>";
		// print_r(Image::all()->tags->toArray());
		// echo "</pre>";
		// exit();	
		$data = ['images'=>$images,'tags'=>$tags];


		return View::make('newposts.index',$data);
		// return View::make('newposts.index')->with('images',$images);
	}

	/**
	 * Show the form for creating a new newpost
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = new Tag;		
		// echo "<pre>";
		// print_r($tags->getTopFive());
		// echo "</pre>";
		// exit();			
		return View::make('newposts.create')->with('tags',$tags->getTopFive());
	}

	/**
	 * Store a newly created newpost in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = Input::all();

		$destinationPath = public_path().'/img/';
		$filename        = '';

		if (Input::hasFile('image')) {
			$file            = Input::file('image');
			$filename        = str_random(6) . '_' . $file->getClientOriginalName();
			$uploadSuccess   = $file->move($destinationPath, $filename);
		}

		$image = Image::create(array('filename' => $filename , 'path' =>'/img/' ));
		$imageInsertedId = $image->id;
		// echo "<pre>";
		// print_r($insertedId);
		// print_r($post['tags']);
		// echo "</pre>";
		// exit();		

		// 新增標籤

		// 1.切割字串
		// 以下迴圈
		// 2.找尋字串表有無存在
		// 3.1無,存入字串表,取出tag_id
		// 3.2,有,查詢,取出tag_id
		// 4.image_id、tag_id 存入image_tag_map
	

		$aryTag = explode(" ",$post['tags']);
			
		foreach ($aryTag as $key => $value) {

			if(trim($value)){
				Tag::firstOrCreate(array('name' => $value));	
				$tag = Tag::where('name','=',$value)->first();

				$imageTagMap = new ImagesTagsMap;
				$imageTagMap->image_id = $imageInsertedId;
				$imageTagMap->tag_id = $tag->id;
				$imageTagMap->save();				
			}
		}

		return Redirect::action('NewpostsController@index');
	}

	/**
	 * Display the specified newpost.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$newpost = Newpost::findOrFail($id);

		return View::make('newposts.show', compact('newpost'));
	}

	/**
	 * Show the form for editing the specified newpost.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$newpost = Newpost::find($id);

		return View::make('newposts.edit', compact('newpost'));
	}

	/**
	 * Update the specified newpost in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$newpost = Newpost::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Newpost::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$newpost->update($data);

		return Redirect::route('newposts.index');
	}

	/**
	 * Remove the specified newpost from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Newpost::destroy($id);

		return Redirect::route('newposts.index');
	}

	public function tagList(){
		$tags = new Tag;
		$images = Image::all();
		// $tags = Tag::all();
		// $imagesTag = ImagesTagsMap::find($images->id);
		// echo "<pre>";
		// print_r(Image::all()->tags->toArray());
		// echo "</pre>";
		// exit();	
		$data = ['images'=>$images,'tags'=>$tags];


		return View::make('newposts.taglist',$data);		
		// echo "<pre>";
		// print_r($tags->getCount());
		// echo "</pre>";
		// exit();			
		// return View::make('newposts.taglist')->with('tags',$tags);
	}
}
