<?php

class Ignore extends \Eloquent
{

    protected $table = "artist_exception";
    protected $fillable = ['artist_id'];
    protected $primaryKey = 'artist_id';

    function artist()
    {
        return $this->belongsTo('Artist');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->toIso8601String();
    }

}
