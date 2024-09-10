<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use App\Models\Raceyear;
use App\Models\Stage;
use App\Models\Result;

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
    
return view ('stages', ['data' => $data]);
}
 
}