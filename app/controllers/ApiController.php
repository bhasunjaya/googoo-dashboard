<?php

class ApiController extends BaseController
{

    /**
     * 2014-09-25
     */
    function playlist()
    {
        //get listeners on this program_id and Date
        //foreach listeners get the music interest
        $date = '2014-09-25';
        $sql = "
            SELECT 
            mi.artist_id,a.name,count(fb_user_id) as total 
            FROM listeners l
                LEFT JOIN music_interests mi ON mi.fb_user_id=l.facebook_id 
                LEFT JOIN artists a ON a.id = mi.artist_id
            WHERE l.program_id =2
                AND DATE( l.created_at ) =  ?
                AND mi.artist_id IS NOT NULL
            GROUP BY mi.artist_id
            ORDER BY total DESC
        ";
        $results = DB::select($sql, array($date));
        return Response::json($results);
    }

    /**
     * Ajax for changing programs
     * 
     * GET /api/program/change/{id}
     * @param int $id
     * @return json
     */
    public function programChange($id)
    {
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

    public function listeners($id)
    {
        $sql = "
        SELECT * FROM `listeners` 
        WHERE 
            `program_id` = '2' 
            and DATE(created_at) = '2014-09-25' 
            ORDER BY `created_at` DESC           
        ";
        $date = '2014-09-25';
        $listeners = Listener::where('program_id', $id)
            ->whereRaw('DATE(created_at) = ?', array($date))
            ->orderBy('created_at', 'DESC')
            ->get();
        return Response::json($listeners);
    }

    public function nosong($programID)
    {
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

}
