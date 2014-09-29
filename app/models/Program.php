<?php

class Program extends \LaravelBook\Ardent\Ardent
{

    public $timestamps = false;
    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required',
        'min_bpm' => 'required',
        'max_bpm' => 'required'
    );
    public $autoHydrateEntityFromInput = true;
    public $forceEntityHydrationFromInput = true;

}
