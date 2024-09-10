<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\Raceyear;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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
            'rider.*', 'team_year.*', 'team.*','rider_team_year.*','team.id as team_id_id','team_year.id as team_year_id','rider.id as rider_id'  
        )
        ->where('rider.id', $id)   
        ->first();
        $stagesData = Rider::leftJoin('result', 'rider.id', '=', 'result.id_rider') 
        ->leftJoin('stage', 'result.id_stage', '=', 'stage.id') 
        ->leftJoin('race_year', 'stage.id_race_year', '=', 'race_year.id') 
        ->select(
            'result.rank', 
            'stage.number as stage_number',
            'stage.date', 
            'stage.distance', 
            'race_year.real_name as race_name',     
            'result.id_stage as stage_id' 
        )
        ->where('rider.id', $id)  
        ->get(); 
   
 

return view ('ridersdata', ['data' => $data, 'stagesData' => $stagesData]);

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
    public function exportRiders()
{
    $riders = Rider::all();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Křestní Jméno');
    $sheet->setCellValue('C1', 'Přijmení');
    $sheet->setCellValue('D1', 'Datum narození');
    $sheet->setCellValue('E1', 'Místo narození');
    $sheet->setCellValue('F1', 'Váha');
    $sheet->setCellValue('G1', 'Výška');

    $row = 2;
    foreach ($riders as $item) {
        $sheet->setCellValue('A' . $row, $item->id);
        $sheet->setCellValue('B' . $row, $item->first_name);
        $sheet->setCellValue('C' . $row, $item->last_name);
        $sheet->setCellValue('D' . $row, $item->date_of_birth);
        $sheet->setCellValue('E' . $row, $item->place_of_birth);
        $sheet->setCellValue('F' . $row, $item->weight);
        $sheet->setCellValue('G' . $row, $item->height);

        $row++;
    }
    $writer = new Xlsx($spreadsheet);

    $filename = 'users_export_' . date('Y-m-d_H:i:s') . '.xlsx';
    $response = new StreamedResponse(function() use ($writer) {
        $writer->save('php://output');
    });

    $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $response->headers->set('Content-Disposition', 'attachment;filename="' . $filename . '"');
    $response->headers->set('Cache-Control', 'max-age=0');

    return $response;
}
public function multiEdit (Request $request)
{
   
    $ids = explode(',', $request->query('id'));
    $riders = Rider::findMany($ids);
    return view('multi-edit', ['riders' => $riders]);
}
public function saveMultiEdit(Request $request)
{

    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:rider,id',
        'first_name.*' => 'required|string',
        'last_name.*' => 'required|string',
        'date_of_birth.*' => 'required|date_format:Y-m-d', 
        'place_of_birth.*' => 'nullable|string',
        'weight.*' => 'nullable|numeric',
        'height.*' => 'nullable|numeric',
        'photo.*' => 'nullable|image|mimes:jpeg,png|max:2048', 
    ]);

    DB::beginTransaction();
    try {
        $ids = $request->input('ids');
        $riders = Rider::findMany($ids);

        foreach ($riders as $rider) {
            $index = array_search($rider->id, $ids);
            $imageName = null;
            if ($request->hasFile('photo') && $request->file('photo')[$index]->isValid()) {
                $imageFile = $request->file('photo')[$index];
                $imageName = time() . '-' . $rider->id . '.' . $imageFile->extension();
                $imageFile->move(public_path('obrazky'), $imageName);
            }

            $rider->first_name = $request->input('first_name')[$index];
            $rider->last_name = $request->input('last_name')[$index];
            $rider->date_of_birth = Carbon::parse($request->input('date_of_birth')[$index])->format('Y-m-d');
            $rider->place_of_birth = $request->input('place_of_birth')[$index];
            $rider->weight = $request->input('weight')[$index];
            $rider->height = $request->input('height')[$index];
            
            if ($imageName) {
                $rider->photo = $imageName;
            }

            $rider->save();
        }

        DB::commit();
        $request->session()->flash('success', "Cyklisti byli úspěšně editováni");
    } catch (\Exception $e) {
        DB::rollback();
        $request->session()->flash('error', "Nastala chyba při editaci cyklistů! {$e->getMessage()}");
    }

    return redirect('/riders');
}
}