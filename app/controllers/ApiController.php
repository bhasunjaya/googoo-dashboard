<?php

class ApiController extends BaseController {

    /**
     * 2014-09-25
     */
    function playlist() {
        $date = App::environment() == 'local' ? '2014-09-25' : date('Y-m-d');
        $date = date('Y-m-d');
        $program = Program::where('is_active', 'true')->first();


        $sql = "
            SELECT `music_interests`.`artist_id`, count(fb_user_id) as total, 
            MAX(listeners.created_at) as last, `artists`.`name`
            FROM `listeners`
                LEFT JOIN `music_interests` ON `music_interests`.`fb_user_id`=`listeners`.`facebook_id`
                LEFT JOIN `artists` ON `artists`.`id`=`music_interests`.`artist_id`
            WHERE 
                `listeners`.`program_id` = ?
                AND DATE(listeners.created_at) = ?
                AND `artists`.`name` IS NOT NULL
                AND artists.id NOT IN (SELECT artist_id FROM artist_exception)
            GROUP BY `music_interests`.`artist_id`
            ORDER BY `total` DESC
        ";

        $results = DB::select($sql, array($program->id, $date));
        $songs = array();
        foreach ($results as $i) {

            $allsongs = Song::where('artist_id', $i->artist_id)
                    ->whereRaw('bpm BETWEEN ' . $program->min_bpm . ' AND ' . $program->max_bpm, array())
                    ->limit(5)
                    ->get();

            $sql = "SELECT m.id, m.fullname "
                    . "FROM members m INNER JOIN music_interests mi "
                    . "ON mi.`fb_user_id` = m.`facebook_id` "
                    . "WHERE mi.`artist_id` = ?";
            $likedmember = DB::select($sql, array($i->artist_id));

            if ($allsongs->toArray()) {
                $song['id'] = $i->artist_id;
                $song['artist'] = $i->name;
                $song['total'] = $i->total;
                $song['total_song'] = count($allsongs);
                $song['liked_member'] = count($likedmember);
                $song['last'] = $i->last;
                $song['songs'] = $allsongs->toArray();
                $songs[] = $song;
            }

            if (count($songs) > 9) {
                break;
            }
        }
        $json['success'] = true;
        $json['data'] = $songs;
        return Response::json($json);
    }

    function likedmember($id) {
        $sql = "SELECT m.id, m.fullname "
                . "FROM members m INNER JOIN music_interests mi "
                . "ON mi.`fb_user_id` = m.`facebook_id` "
                . "WHERE mi.`artist_id` = ?";
        $results = DB::select($sql, array($id));
        $result = "";
        foreach ($results as $key => $value) {
            $result .= $value->fullname . ", ";
        }
        $json['success'] = true;
        $json['data'] = $result;
        return Response::json($json);
    }

    /**
     * Ajax for changing programs
     * 
     * GET /api/program/change/{id}
     * @param int $id
     * @return json
     */
    public function programChange($id) {
        DB::table('programs')
                ->where('is_active', 'true')
                ->update(array('is_active' => 'false'));

        $program = Program::find($id);
        $program->is_active = 'true';
        $program->save();

        $resp['success'] = true;
        $resp['data'] = $program;
        return Response::json($resp);
    }

    public function listeners($id) {
        $date = date('Y-m-d');
        $sql = "
        SELECT * FROM `listeners` 
        WHERE 
            `program_id` = '2' 
            and DATE(created_at) = '2014-09-25' 
            ORDER BY `created_at` DESC           
        ";
        $listeners = Listener::where('program_id', $id)
                ->whereRaw('DATE(created_at) = ?', array($date))
                ->orderBy('created_at', 'DESC')
                ->get();
        return Response::json(array('data' => $listeners));
    }

    public function nosong($programID) {
        $date = App::environment() == 'local' ? '2014-09-25' : date('Y-m-d');
        $sql = "
            SELECT 
                a.id,a.name,count(*) as total
            FROM listeners l
                LEFT JOIN music_interests mi ON mi.fb_user_id = l.facebook_id
                LEFT JOIN artists a ON a.id = mi.artist_id
                LEFT JOIN songs s ON s.artist_id = mi.artist_id
            WHERE 
                l.program_id = ?
                AND DATE(l.created_at) = ? 
                AND a.name IS NOT  NULL
                AND s.title IS NULL
            GROUP BY a.id
            ORDER BY total DESC  
            LIMIT 10
        ";
        $results = DB::select($sql, array($programID, $date));
        return Response::json($results);
    }

    public function ignoreList() {
        $ignore = Ignore::with('artist')
                ->orderBy('created_at')
                ->get();
        return Response::json(array('data' => $ignore->toArray()));
    }

    function ignore($id) {
        $ignore = Ignore::find($id);
        if (!$ignore) {
            $ignore = Ignore::create(['artist_id' => $id]);
        }

        return Response::json($ignore);
    }

    function ignoreRemove($id) {
        $ignore = Ignore::find($id);
        if ($ignore) {
            $ignore->delete();
        }
        return Response::json($ignore);
    }

    function ignoreRemoveAll() {
        $ignore = Ignore::truncate();
        return Response::json($ignore);
    }

    function newsong($id) {
        $users = Newsong::where('song_id', '=', $id)->get()->toArray();
        if (empty($users)) {
            $newsong = new Newsong();
            $newsong->song_id = $id;
            $newsong->save();
        }

        return Response::json($id);
    }
    
    function listartist(){
        echo "test";
    }

}
