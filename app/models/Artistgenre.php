<?php

class Artistgenre extends \Eloquent {
	protected $fillable = [];
        const CREATED_AT = 'created_at';
        const UPDATED_AT = 'modified_at';
	protected $table = 'artist_has_genres';


}