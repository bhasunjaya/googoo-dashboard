<?php

class ArtistController extends BaseController {

    public function getIndex() {
        $artists = Artist::getArtists(10);
        // return Response::json($artists);
        return View::make('artist.getIndex')
                        ->with('artists', $artists);
    }

    public function getShow($id) {
        $artist = Artist::with('songs', 'genres', 'fbartist')->findOrFail($id);
        return View::make('artist.getShow')
                        ->with('artist', $artist);
    }

    public function getEdit($id) {
        $artist = Artist::with('genres')->findOrFail($id);
        return View::make('artist.getEdit')->withArtist($artist);
    }
    
    function getArtistlist(){
        $term = trim(strip_tags($_GET['term']));
        $all_artist = Artist::getArtistByName($term);
        if (!empty($all_artist)){
            foreach ($all_artist as $value) {
                $row['value']=htmlentities(stripslashes($value->name));
                $row['data']=$value->id;
                $row_set[] = $row;//build an array
            }
        }else{
            $row['value']=htmlentities(stripslashes('Tidak ditemukan, klik + untuk tambahkan ke database?'));
            $row['data']= 0;
            $row_set[] = $row;//build an array
        }
        return Response::json($row_set);
        
    }

    public function getDelete($id) {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return Redirect::to('/artist');
    }

    public function postEdit($id) {
        $artist = Artist::findOrFail($id);
        $artist->name = Input::get('name');
        if ($artist->save()) {
            $genre_list = Input::get('genre');
            //remove old genre
            $old_genre = Artistgenre::where('artist_id', '=', $id);
            $old_genre->delete();

            $argenre = explode(",", $genre_list);
            foreach ($argenre as $value) {
                $genre_slug = Str::slug(strtolower($value));
                if ($genre_slug != "") {
                    $sql = "SELECT * FROM genres WHERE slug = ?";
                    $genre = DB::select($sql, array($genre_slug));
                    if ($genre) {
                        $sql = "SELECT * FROM artist_has_genres WHERE artist_id = ? AND genre_id = ?";
                        $data = DB::select($sql, array($id, $genre[0]->id));
                        if (!$data) {
                            $artistgenre = new Artistgenre;
                            $artistgenre->artist_id = $id;
                            $artistgenre->genre_id = $genre[0]->id;
                            $artistgenre->save();
                        }
                    } else {
                        $newgenre = new Genre;
                        $newgenre->genre_hash = md5($genre_slug);
                        $newgenre->slug = $genre_slug;
                        $newgenre->name = $value;
                        if ($newgenre->save()) {
                            $artistgenre = new Artistgenre;
                            $artistgenre->artist_id = $id;
                            $artistgenre->genre_id = $newgenre->id;
                            $artistgenre->save();
                        }
                    }
                }
            }

            //similar artist

            $similar = Input::get('sim_name');
            $sim_id = Input::get('sim_id');
            $old_similar = Similar::where('artist_id', '=', $id)
                    ->orWhere('similar_artist_id', '=', $id);
            $old_similar->delete();
            
            foreach ($similar as $key => $sim_name){
                if ($sim_name != ""){
                    $newsimilar = new Similar;
                    $newsimilar->artist_id = $id;
                    $newsimilar->similar_artist_id = $sim_id[$key];
                    $newsimilar->save();
                    
                    $newsimilar = new Similar;
                    $newsimilar->artist_id = $sim_id[$key];
                    $newsimilar->similar_artist_id = $id;
                    $newsimilar->save();
                }
            }

            return Redirect::to('/artist/show/' . $id)->with('message', 'data has been updated');
        } else {
            return Redirect::to('/artist/edit/' . $id)->withErrors($artist->errors());
        }
    }

    function getInterest() {
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
