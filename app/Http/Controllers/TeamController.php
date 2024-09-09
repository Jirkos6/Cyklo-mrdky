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
    $team = Team::with(['teamYears.riders'])->where('id', $id)->first();

    if (!$team) {
        abort(404, 'Tým nenalezen');
    }

    return view('teamsdata', compact('team'));
}


}