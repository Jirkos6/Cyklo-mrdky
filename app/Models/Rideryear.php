<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rideryear extends Model
{
    use HasFactory;

    protected $table = 'rider_team_year';

    protected $fillable = ['id_rider', 'id_team_year', 'rider_foto_year']; 

    use SoftDeletes;
}
