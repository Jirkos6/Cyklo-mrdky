<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rider extends Model
{
    use HasFactory;

    protected $table = 'rider'; 

    protected $fillable = ['first_name', 'last_name ', 'date_of_birth','place_of_birth','photo','weight','height','updated_at','deleted_at','created_at']; 

    use SoftDeletes;
    public function teamYears()
    {
        return $this->belongsToMany(TeamYear::class, 'rider_team_year', 'id_rider', 'id_team_year');
    }
}

