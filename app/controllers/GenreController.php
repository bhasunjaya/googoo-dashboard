<?php

class GenreController extends BaseController {

    public function getIndex() {
        $genres = Genre::getGenres(10);
        return View::make('genre.getIndex')
                        ->with('genres', $genres);
    }

    function getEdit($id) {
        $genre = Genre::findOrFail($id);
        return View::make('genre.getEdit')->withGenre($genre);
    }

    function getDelete($id) {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return Redirect::to('/genre');
    }

    function postEdit($id) {
        $genre = Genre::findOrFail($id);
        $genre->name = Input::get('name');
        $genre->slug = Str::slug(strtolower(Input::get('name')));
        if ($genre->save()) {
            return Redirect::to('/genre/edit/' . $id)->with('message', 'data has been updated');
        } else {
            return Redirect::to('/genre/edit/' . $id)->withErrors($genre->errors());
        }
    }

    function getGenrelist() {
        $term = trim(strip_tags($_GET['term']));
        $all_genre = Genre::getGenreByName($term);
        if (!empty($all_genre)) {
            foreach ($all_genre as $value) {
                $row['value'] = htmlentities(stripslashes($value->name));
                $row['data'] = $value->id;
                $row_set[] = $row; //build an array
            }
        } else {
            $row['value'] = htmlentities(stripslashes('Tidak ditemukan, klik + untuk tambahkan ke database?'));
            $row['data'] = 0;
            $row_set[] = $row; //build an array
        }
        return Response::json($row_set);
    }

}
