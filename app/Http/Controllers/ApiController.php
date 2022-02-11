<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    public function getMovement(){
        $query = DB::select('SELECT m.name, RANK() OVER (
            PARTITION BY m.name
            ORDER BY pr.value DESC
        ) Ranking, u.name AS Usuário, pr.value AS Recorde, pr.`date` AS `Data` FROM personal_record pr 
        INNER JOIN movement m ON m.id = pr.movement_id
        INNER JOIN `user` u ON u.id = pr.user_id 
        ORDER BY m.name, `value` DESC');

        $json = json_encode($query);

        return response($json, 200);
    }
}
