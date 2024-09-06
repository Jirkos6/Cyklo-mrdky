<?php

namespace App\Http\Controllers;

use App\Exports\RiderExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
class ExcelController extends Controller 
{
    public function export() 
    {
        return Excel::download(new RiderExport, 'riders.xlsx');
    }
}