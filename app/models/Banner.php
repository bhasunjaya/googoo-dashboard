<?php

class Banner extends \LaravelBook\Ardent\Ardent
{

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'modified_at';

    protected $guarded = ['id'];
    public static $rules = array(
        'name' => 'required',
        'picture' => 'required'
    );

}
