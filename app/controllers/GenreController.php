<?php

class GenreController extends BaseController
{

    public function getIndex()
    {
        $genres = Genre::getGenres(10);
        return View::make('genre.getIndex')
                ->with('genres', $genres);
    }

    function getEdit($id)
    {
        $genre = Genre::findOrFail($id);
        return View::make('genre.getEdit')->withGenre($genre);
    }

    function postEdit($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->name = Input::get('name');
        $genre->slug = Str::slug(strtolower(Input::get('name')));
        if ($genre->save())
        {
            return Redirect::to('/genre/edit/' . $id)->with('message', 'data has been updated');
        }
        else
        {
            return Redirect::to('/genre/edit/' . $id)->withErrors($genre->errors());
        }
    }

}
