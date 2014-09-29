<?php
class SongController extends BaseController {


	function getIndex(){
		$songs = Song::getSongs(10);
		//return Response::json($songs);
		return View::make('song.getIndex')->withSongs($songs);

	}

	function getShow($id){
		$song = Song::findOrFail($id);

		return View::make('song.getEdit')->withSong($song);
		return Response::json($song);
	}


	function getEdit($id){
		$song = Song::findOrFail($id);

		return View::make('song.getEdit')->withSong($song);
		$song = Song::findOrFail($id);
	}

	function postEdit($id){
		$song = Song::findOrFail($id);
		if ($song->save()) {
			return Redirect::to('/artist/show/'.$song->artist_id)->with('message', 'data has been updated');
		} else {
			return Redirect::to('/song/edit/'.$id)->withErrors($song->errors());
		}
	}

}