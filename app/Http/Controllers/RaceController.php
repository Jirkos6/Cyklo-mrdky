<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Raceyear;
use App\Models\Stage;
use App\Models\Result;
use App\Models\Rider;


class RaceController extends Controller
{
function race() {

$data = Race::All();



return view ('race', ['data' => $data]);
    
}
function races($id) {

$data = Raceyear::where('id_race',$id)->get();

return view ('races', ['data' => $data]);
}
function stages($id) {

$data = Stage::where('id_race_year',$id)->get();
$riderResults = Rider::leftJoin('result', 'rider.id', '=', 'result.id_rider') 
->leftJoin('stage', 'result.id_stage', '=', 'stage.id')->leftJoin('team', 'result.id_team', '=', 'team.id')  
->leftJoin('race_year', 'stage.id_race_year', '=', 'race_year.id') 
->leftJoin('race', 'race_year.id_race', '=', 'race.id') 
->select(
    'result.*', 
    'team.*',
    'rider.*')->where('id_stage',$id)
->get();
    
return view ('stages', ['data' => $data, 'riderResults' => $riderResults]);
}
 
}