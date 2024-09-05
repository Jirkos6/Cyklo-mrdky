<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teamyear;
use App\Models\Team;
use App\Models\Rider;

class TeamController extends Controller
{
function teams() {

$data = Team::all();
return view ('teams', ['data' => $data]);

    
}
public function teamsdata($id) {
    $data = Rider::leftJoin('rider_team_year', 'rider.id', '=', 'rider_team_year.id_rider')
        ->leftJoin('team_year', 'rider_team_year.id_team_year', '=', 'team_year.id')
        ->leftJoin('team', 'team_year.id_team', '=', 'team.id')
        ->select(
            'rider.*'
        )
        ->where('team.id', $id)  
        ->get();
        $team = Team::join('team_year', 'team.id', '=', 'team_year.id_team') 
        ->select(
        'team_year.*','team.*'
        )
        ->where('team.id', $id)
        ->first();
    
    return view('teamsdata', ['data' => $data,'team' => $team ]);
}


}