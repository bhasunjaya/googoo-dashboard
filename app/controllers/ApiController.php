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

}
