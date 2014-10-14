<?php

class ArtistController extends BaseController
{

    public function getIndex()
    {
        $artists = Artist::getArtists(10);
        // return Response::json($artists);
        return View::make('artist.getIndex')
                ->with('artists', $artists);
    }

    public function getShow($id)
    {
        $artist = Artist::with('songs', 'genres', 'fbartist')->findOrFail($id);
        return View::make('artist.getShow')
                ->with('artist', $artist);
    }

    public function getEdit($id)
    {
        $artist = Artist::findOrFail($id);
        return View::make('artist.getEdit')->withArtist($artist);
    }
    
    public function getDelete($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return Redirect::to('/artist');
    }

    public function postEdit($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->name = Input::get('name');
        if ($artist->save())
        {
            return Redirect::to('/artist/show/' . $id)->with('message', 'data has been updated');
        }
        else
        {
            return Redirect::to('/artist/edit/' . $id)->withErrors($artist->errors());
        }
    }

    function getInterest()
    {
        $sql = '
		SELECT 
		mi.artist_id,
		count(*) as interest_count,
		(SELECT count(*) FROM songs WHERE artist_id=mi.artist_id) as song_count
		
		FROM music_interests mi 

		GROUP BY mi.artist_id
		ORDER BY interest_count DESC
		LIMIT 0,30
		';
        $res = DB::select($sql);
        return Response::json($res);
    }

}
