<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\Raceyear;


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
            'rider.*', 'team_year.*', 'team.*','rider_team_year.*','team.id as team_id_id'
        )
        ->where('rider.id', $id)  
        ->first();

return view ('ridersdata', ['data' => $data]);

}
    public function create()
    {
        return view('rider-create');
    }
    
 
    public function store(Request $request)
    {
        try {
            $request->validate([
            'photo' => 'required|image|mimes:jpeg,png|max:2048'
            ]);
    
            $imageName = time().'.'.$request->photo->extension(); 
            $rider = new Rider;
            $rider->first_name = $request->input('first_name');
            $rider->last_name = $request->input('last_name');
            $rider->date_of_birth = $request->input('date_of_birth');
            $rider->place_of_birth = $request->input('place_of_birth');
            $rider->photo = $request->input('photo');
            $rider->weight = $request->input('weight');
            $rider->height = $request->input('height');
            $rider->photo = $imageName; 
            $rider->save();
            $request->photo->move(public_path('obrazky'), $imageName); 
    
            return redirect('/riders'); 
        } catch (\Exception $e) {

            $request->session()->flash('error', "Nastala chyba při přidávání cyklisty! {$e->getMessage()}");
    
            return back(); 
        }
    }
    public function delete($id)
    {
        $data = Rider::find($id);
        $data->delete();
    
        return redirect('/riders');
    }
    public function edit($id)
    {
        $data = Rider::find($id);
    
        return view('edit',['data'=>$data]);
    }
    public function update(Request $request,$id){
    try {
    $request->validate([
    'photo' => 'required|image|mimes:jpeg,png|max:2048']);
    
    $imageName = time().'.'.$request->photo->extension(); 
    $rider = Rider::findOrFail($id);
    $rider->first_name = $request->input('first_name');
    $rider->last_name = $request->input('last_name');
    $rider->date_of_birth = $request->input('date_of_birth');
    $rider->place_of_birth = $request->input('place_of_birth');
    $rider->photo = $request->input('photo');
    $rider->weight = $request->input('weight');
    $rider->height = $request->input('height');
    $rider->photo = $imageName; 
    $rider->save();
    $request->photo->move(public_path('obrazky'), $imageName); 

    return redirect('/riders'); 
    } catch (\Exception $e){


        $request->session()->flash('error', "Nastala chyba při editaci cyklisty! {$e->getMessage()}");
    
        return back(); 
    }
    }
    public function welcome(){
        $kategorieW = Raceyear::where('category','W')->count();
        $kategorieM = Raceyear::where('category','M')->count();
        $kategorieU23 = Raceyear::where('category','U23')->count();
        $kategorieJ = Raceyear::where('category','J')->count();
        $kategorieE = Raceyear::where('category','E')->count();
        $totalRaces = Raceyear::count();

        return view('welcome',['kategorieW'=>$kategorieW,'kategorieM'=>$kategorieM,'kategorieU23'=>$kategorieU23,'kategorieJ'=>$kategorieJ,'kategorieE'=>$kategorieE,'totalRaces'=>$totalRaces]);
    }
}