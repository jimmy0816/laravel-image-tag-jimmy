<?php
class Image extends Eloquent {
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['filename','path'];

    public function tags()
    {
        return $this->belongsToMany('Tag', 'images_tags_map');
    }
}