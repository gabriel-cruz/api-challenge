<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    public function getDeadliftRecord(){
        $query = DB::select('SELECT RANK() OVER (
            ORDER BY pr.value DESC
        ) Ranking, u.name AS Usuário, pr.value AS Recorde, pr.`date` AS `Data` FROM personal_record pr 
        INNER JOIN movement m ON m.id = pr.movement_id
        INNER JOIN `user` u ON u.id = pr.user_id
        WHERE pr.movement_id = "1" 
        ORDER BY `value` DESC');

        $json = json_encode($query);
        $response = "Deadlift ".$json;

        return response($response, 200);
    }

    public function getBlackSquatRecord(){
        $query = DB::select('SELECT RANK() OVER (
            ORDER BY pr.value DESC
        ) Ranking, u.name AS Usuário, pr.value AS Recorde, pr.`date` AS `Data` FROM personal_record pr 
        INNER JOIN movement m ON m.id = pr.movement_id
        INNER JOIN `user` u ON u.id = pr.user_id
        WHERE pr.movement_id = "2" 
        ORDER BY `value` DESC');

        $json = json_encode($query);
        $response = "Back Squat ".$json;

        return response($response, 200);
    }

    public function getBrenchPressRecord(){
        $query = DB::select('SELECT RANK() OVER (
            ORDER BY pr.value DESC
        ) Ranking, u.name AS Usuário, pr.value AS Recorde, pr.`date` AS `Data` FROM personal_record pr 
        INNER JOIN movement m ON m.id = pr.movement_id
        INNER JOIN `user` u ON u.id = pr.user_id
        WHERE pr.movement_id = "3" 
        ORDER BY `value` DESC');

        $json = json_encode($query);
        $response = "Bench Press ".$json;

        return response($response, 200);
    }
}
