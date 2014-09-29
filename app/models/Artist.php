<?php

class Artist extends \LaravelBook\Ardent\Ardent  {

	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'modified_at';

	protected $guarded = ['id'];
	public static $rules = array(
		'name'                  => 'required'
		);




	function songs(){
		return $this->hasMany('Song')->orderBy('title');
	}

	function fbartist(){
		return $this->belongsToMany('Fbartis', 'artist_has_fb','artist_id','fb_artist_id');
	}

	function genres(){
		return $this->belongsToMany('Genre','artist_has_genres');
	}


	static function getArtists($limit=10){
		
		$artists = self::with('genres')->orderBy('modified_at','DESC');
		if(Input::get('q')){
			$q = '%'.Input::get('q').'%';
			$artists->where('name','like',$q);
		}
		return $artists->paginate($limit);
	}

	function scopeOfSlug($query,$slug){
		return $query->where('slug', '=', trim($slug));
	} 
}