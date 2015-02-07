<?php
class ImagesTagsMap extends Eloquent {

    protected $table = 'images_tags_map';

 	protected $fillable = array('image_id', 'tag_id');
}