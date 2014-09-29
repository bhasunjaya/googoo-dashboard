<?php

class Genre extends \Eloquent {
	protected $fillable = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at';

	
	function scopeOfSlug($query,$slug){
		return $query->where('slug', '=', trim($slug));
	} 
}