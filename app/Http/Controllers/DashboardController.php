<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rider;
use App\Models\Team;
use App\Models\Rideryear;


class DashboardController extends Controller
{
function dashboardgraph() {

$data = User::count();

$riderCount = Rider::all()->count();

$teamCount = Team::all()->count();

$riderCountTotal = Rideryear::all()->count();

return view ('dashboard', ['data' => $data, 'riderCount' => $riderCount, 'teamCount' => $teamCount, 'riderCountTotal' => $riderCountTotal]);
    
}
function dashboardtinymce(){
return view('dashboard-tinymce');

}


}