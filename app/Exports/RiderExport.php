<?php

namespace App\Exports;

use App\Models\Rider;
use Maatwebsite\Excel\Concerns\FromCollection;

class RiderExport implements FromCollection
{
    public function collection()
    {
        return Rider::all();
    }
}