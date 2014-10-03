<?php

class RuangsiarController extends BaseController
{

    public function getIndex()
    {
        $programs = Program::all();
        return View::make('ruangsiar.getIndex')
                ->withPrograms($programs);
    }

}
