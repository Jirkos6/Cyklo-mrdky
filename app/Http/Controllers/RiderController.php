<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;

class RiderController extends Controller
{
function riders() {

    $data = Rider::leftJoin('rider_team_year', 'rider.id', '=', 'rider_team_year.id_rider')  
    ->leftJoin('team_year', 'rider_team_year.id_team_year', '=', 'team_year.id') 
    ->leftJoin('team', 'team_year.id_team', '=', 'team.id') 
    ->select('rider.*', 'team_year.*', 'team.*','rider.id as rider_id') 
    ->get();

return view ('riders', ['data' => $data]);
    
}
function ridersdata($id) {

    $data = Rider::leftJoin('rider_team_year', 'rider.id', '=', 'rider_team_year.id_rider')  
        ->leftJoin('team_year', 'rider_team_year.id_team_year', '=', 'team_year.id') 
        ->leftJoin('team', 'team_year.id_team', '=', 'team.id') 
        ->select(
            'rider.id as rider_id',  
            'rider.*', 'team_year.*', 'team.*','rider_team_year.*'
        )
        ->where('rider.id', $id)  
        ->first();

return view ('ridersdata', ['data' => $data]);

}
}