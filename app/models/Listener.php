<?php

class Listener extends \Eloquent
{

    protected $fillable = [];

    static function currentListener($id, $date)
    {
        return self::where('program_id', $id)
                ->whereRaw('DATE(created_at) = ?', array($date))
                ->orderBy('created_at', 'DESC')
                ->get();
    }

}
