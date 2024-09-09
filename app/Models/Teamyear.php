<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Teamyear extends Model
{
    use HasFactory;

    protected $table = 'team_year';

    protected $fillable = ['id_team','year','name','abbreviation','team_status','bike','jersey','link']; 

    use SoftDeletes;
    

    public function team()
    {
        return $this->belongsTo(Team::class, 'id_team', 'id');
    }

    public function riders()
    {
        return $this->belongsToMany(Rider::class, 'rider_team_year', 'id_team_year', 'id_rider');
    }
}
