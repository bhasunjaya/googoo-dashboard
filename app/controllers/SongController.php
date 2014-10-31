<?php

class SongController extends BaseController {

    function getIndex() {
        $songs = Song::getSongs(10);
        //return Response::json($songs);
        return View::make('song.getIndex')->withSongs($songs);
    }

    function getShow($id) {
        $song = Song::findOrFail($id);

        return View::make('song.getEdit')->withSong($song);
    }

    function getEdit($id) {
        $song = Song::findOrFail($id);

        return View::make('song.getEdit')->withSong($song);
    }

    function postEdit($id) {
        $song = Song::findOrFail($id);
        if ($song->save()) {
            return Redirect::to('/artist/show/' . $song->artist_id)->with('message', 'data has been updated');
        } else {
            return Redirect::to('/song/edit/' . $id)->withErrors($song->errors());
        }
    }

    public function getDelete($id) {
        $song = Song::findOrFail($id);
        $song->delete();
        Response::json($song);
    }

    public function getPreimport() {
        return View::make('song.getPreimport');
    }

    public function getImport() {
        $songs = Cache::remember('spreadsheet', 10, function() {
                    $spreadsheet_url = 'https://docs.google.com/spreadsheet/pub?key=0Aq79H_FkDfcZdGZWQk9lQU1jZVY5WVB4UVduZV80UWc&output=csv';
                    if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
                        $row = 0;
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            if ($row > 20)
                                break;

                            $song['artist'] = $data[0];
                            $song['title'] = $data[1];
                            $song['album'] = $data[2];
                            $song['genre'] = $data[3];
                            $song['year'] = $data[4];
                            $song['bpm'] = $data[5];
                            $songs[] = $song;
                            $row++;
                        }
                    }
                    fclose($handle);
                    return $songs;
                });

        foreach ($songs as $song) {
            $dbsong = Song::where('slug', Str::slug(strtolower($song['artist'] . ' ' . $song['title'])))->first();
            if (!$dbsong) {
                $dbsong = new Song;
                $dbsong->title = $song['title'];
                $dbsong->artist = $song['artist'];
                $dbsong->album = $song['album'];
                $dbsong->genre = $song['genre'];
                $dbsong->release_year = $song['year'];
                $dbsong->bpm = $song['bpm'];
                if ($dbsong->save()) {
                    $dbsong->updated = 'inserted';
                    $dsongs[] = $dbsong;
                } else {
                    die('excell salaah?');
                }
            } else {
                $dbsong->save();
                $dbsong->updated = 'already exists,updated';
                $dsongs[] = $dbsong;
            }
        }

        return View::make('song.getImport')->withSongs($dsongs);
    }

}
