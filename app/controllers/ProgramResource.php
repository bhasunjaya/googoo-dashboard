<?php

class ProgramResource extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /programresource
     *
     * @return Response
     */
    public function index()
    {
        $programs = Program::orderBy('name')->paginate(10);
        return View::make('program.index')->withPrograms($programs);
    }

    /**
     * Show the form for creating a new resource.
     * GET /programresource/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('program.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /programresource
     *
     * @return Response
     */
    public function store()
    {
        $program = new Program;
        if ($program->save())
        {
            return Redirect::to('/program')->with('message', 'data has been updated');
        }
        else
        {
            return Redirect::to('/program/create')->withErrors($program->errors());
        }
    }

    /**
     * Display the specified resource.
     * GET /programresource/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /programresource/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        return View::make('program.edit')->withProgram($program);
    }

    /**
     * Update the specified resource in storage.
     * PUT /programresource/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $program = Program::find($id);
        if ($program->save())
        {
            return Redirect::to('/program')->with('message', 'data has been updated');
        }
        else
        {
            return Redirect::to('/program/' . $id . '/edit')->withErrors($program->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /programresource/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
