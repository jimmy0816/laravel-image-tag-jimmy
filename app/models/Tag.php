<?php
class Tag extends Eloquent {

    protected $table = 'tags';

    protected $fillable = array('name');

    public function tags()
    {
        return $this->belongsToMany('Tag', 'images_tags_map');
    }

    public function getTopFive()
    {
        return DB::select('select t.name as name,count(*) as count from images_tags_map as itm , tags as t where itm.tag_id = t.id group by itm.tag_id ORDER BY count DESC limit 0,5');
    }    
    public function getCount()
    {
    	return DB::select('select t.name as name,t.id as id,count(*) as count from images_tags_map as itm , tags as t where itm.tag_id = t.id group by itm.tag_id ORDER BY count DESC');
    }
}