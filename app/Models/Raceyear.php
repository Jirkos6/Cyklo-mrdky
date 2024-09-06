<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Raceyear extends Model
{
    use HasFactory;

    protected $table = 'race_year'; 

    protected $fillable = ['real_name', 'id_race ', 'year','start_date','end_date','uci_tour','logo','sex','category','country']; 

    use SoftDeletes;
}
